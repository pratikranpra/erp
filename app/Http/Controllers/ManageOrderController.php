<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageOrderRequest;
use App\Models\ChildItem;
use App\Models\Customer;
use App\Models\CustomerShippingAddress;
use App\Models\Item;
use App\Models\ManageOrder;
use App\Models\OrderItemLists;
use App\Models\Vendor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Catch_;

class ManageOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $employee_id = employee_id();
        if($employee_id > 0){
            $manageOrders = ManageOrder::with('customerData')->where('employee_id', $employee_id)->orderBy('id', 'desc')->paginate();
        }else{
            $manageOrders = ManageOrder::with('customerData')->orderBy('id', 'desc')->paginate();
        }
        return view('manage-order.index', compact('manageOrders'))
            ->with('i', ($request->input('page', 1) - 1) * $manageOrders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $manageOrder = new ManageOrder();
        $employee_id = employee_id();
        $all_customer = Customer::select("id","name")->where('status', '=','active')->get();
        $product_type = [ 1 => 'Manufactured', 2 => 'Readymade'];
        $shopping_mode = [ 1 => 'Air', 2 => 'Road', 3 => 'Transport',4=>"Other"];
        $rand_num = rand(1000, 9999);
        if($employee_id > 0){
            $items_lists = Item::with('imageDetails')->where('employee_id','=',$employee_id)->orderBy('id', 'desc')->paginate();
        }else{
            // For admin or other users, show all items
            $items_lists = Item::with('imageDetails')->orderBy('id', 'desc')->paginate();
        }
        return view('manage-order.create', compact('manageOrder','all_customer','product_type','shopping_mode','items_lists','rand_num'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManageOrderRequest $request): RedirectResponse
    {
       //dd($request->all());
        $order_item_id = request('order_item_id');
        $order_item_qty = request('order_item_qty');
        $order_item_unit = request('order_item_unit');
        $order_item_rate = request('order_item_rate');
        $order_item_discount = request('order_item_discount');
        $order_vendor_id = request('vendor_id');
        $key_data = request('key');
        $value_data = request('value');
        $shipping_address_id = request('shipping_address_id');
        $customer_id = request('customer_id');
        
       try{
            $data = $request->validated();

            $data = Arr::except($data, ['shipping_address_id']);

            $manageorders =  ManageOrder::create($data);
            $employee_id = employee_id();
            $order_id = $manageorders->id;
            $manageorders->employee_id = $employee_id;
            //log::info("Shop ID: " . $shipping_address_id);
            if (!is_numeric($shipping_address_id) &&  !empty(trim($shipping_address_id)) ) {
                    $customer_ship_address = CustomerShippingAddress::create([
                        'customer_id' => $customer_id,
                        'address' => $shipping_address_id,
                        'status' => "active",
                    ]);
                    $new_shipping_address_id = $customer_ship_address->id;
                    //log::info("New Shipping Address ID: " . $new_shipping_address_id);
                    $manageorders->shipping_address_id = $new_shipping_address_id;
            }else{
                $manageorders->shipping_address_id = $shipping_address_id;   
            }
            $manageorders->sku = "ORD-".round(microtime(true));
            $manageorders->save();
            // addd item to order_item_lists
            if(!empty($order_item_id)){
                $cnt = 0;
                foreach($order_item_id as $key=>$item){
                    //$key_data_total = isset($key_data[$key]) ? count($key_data[$key]) : 0;
                    $key_data_single = isset($key_data[$key]) ? $key_data[$key] : [];
                    $value_data_single = isset($value_data[$key]) ? $value_data[$key] : [];
                    $custom_data = [];
                    foreach($key_data_single as $k => $v) {
                        if(!empty($v)){
                            $custom_data[] = [
                                $v => isset($value_data_single[$k]) ? $value_data_single[$k] : '',
                            ];
                        }
                    }
                    $data =  [
                        'order_id' => $order_id,
                        'order_item_id' => ($order_item_id[$key][0]) ?? 0,
                        'order_item_qty' => ($order_item_qty[$key][0]) ?? 0,
                        'order_item_unit' => ($order_item_unit[$key][0]) ?? 0,
                        'order_item_rate' => ($order_item_rate[$key][0]) ?? 0,
                        'order_item_disc' => ($order_item_discount[$key][0]) ?? 0,
                        'vendor_id' => ($order_vendor_id[$key][0]) ?? 0,
                        'order_item_custom_data' => json_encode($custom_data),
                    ];
                    OrderItemLists::create($data);
                    $cnt++;
                }
            }
            $path = $employee_id > 0 ? 'employee.manage-orders.index' : 'manage-orders.index';
            return Redirect::route($path)
                ->with('success', 'ManageOrder created successfully.');
       }catch(\Exception $e){
        dd($e->getMessage());
            return Redirect::back()->withErrors(['error' => 'Error creating ManageOrder: ' . $e->getMessage()]);
        }   

        
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $manageOrder = ManageOrder::with('shippingAddess')->find($id);
        $orderItemLists = OrderItemLists::where('order_id', $id)
                            ->leftjoin('items', 'order_item_lists.order_item_id', '=', 'items.id')
                            ->leftjoin('vendors', 'vendors.id', '=', 'order_item_lists.vendor_id')
                            ->select('order_item_lists.*', 'items.name as item_name',"vendors.name as vendor_name")
                            ->get();

        return view('manage-order.show', compact('manageOrder','orderItemLists'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $manageOrder = ManageOrder::find($id);

        return view('manage-order.edit', compact('manageOrder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManageOrderRequest $request, ManageOrder $manageOrder): RedirectResponse
    {
        $manageOrder->update($request->validated());

        return Redirect::route('manage-orders.index')
            ->with('success', 'ManageOrder updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ManageOrder::find($id)->delete();
        OrderItemLists::where('order_id', $id)->delete();
        return Redirect::route('manage-orders.index')
            ->with('success', 'ManageOrder deleted successfully');
    }

    //function for customer billing address
    public function customerBillingAddress(Request $request)
    {
        $customerId = $request->input('customer_id');
        $commonCont = new commonConstroller();
        $html = $commonCont->loadCustomerShippingAddress($customerId);
        return response()->json([ 'status' => 'success', 'message' =>"", 'data' => $html ]);
    }

    public function loadMoreItemData(Request $request)
    {
        $employee_id = $request->employee_id > 0 ? $request->employee_id : 0;
        $commonCont = new commonConstroller();
        $html = $commonCont->itemOrderData($employee_id);
        return response()->json([ 'status' => 'success', 'message' =>"", 'data' => $html ]);
    }
    public function loadVendorData(Request $request)
    {
        $itemId = $request->input('item_id');
        $rand_num= $request->input('rand_id');

        $get_child_item_detail =  ChildItem::query()->where('parent_item_id',$itemId)->first();
        $item_Vendor_ids = (isset($get_child_item_detail->item_child_vendor) && $get_child_item_detail->item_child_vendor !="")?(explode(",",$get_child_item_detail->item_child_vendor)):[0];
        $vendorLists = Vendor::whereIn('id', $item_Vendor_ids)->get();
        $html = view('manage-order.vendor_lists', compact('vendorLists','rand_num'))->render();

        return response()->json([
            'status'  => 'success',
            'message' => '',
            'data'    => $html
        ]);
    }
}
