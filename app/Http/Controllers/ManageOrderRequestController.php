<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageOrderRequest;
use App\Models\Customer;
use App\Models\CustomerShippingAddress;
use App\Models\Item;
use App\Models\ManageOrder;
use App\Models\OrderItemLists;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf as domPDF;

use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ManageOrderRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        
        $manageOrders = ManageOrder::with('customerData')->orderBy('id', 'desc')->paginate();
        
        return view('manage-order-request.index', compact('manageOrders'))
            ->with('i', ($request->input('page', 1) - 1) * $manageOrders->perPage());
    }

   
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $manageOrder = ManageOrder::with('shippingAddess')->find($id);
        $orderItemLists = OrderItemLists::where('order_id', $id)
                            ->leftjoin('items', 'order_item_lists.order_item_id', '=', 'items.id')
                            ->select('order_item_lists.*', 'items.name as item_name')
                            ->get();

        return view('manage-order-request.show', compact('manageOrder','orderItemLists'));
    }

    public function completeOrder(Request $request)
    {
        $order_id = $request->order_id > 0 ? $request->order_id : 0;
        $bill_no = $request->bill_no > 0 ? $request->bill_no : 0;

        $orderItems = OrderItemLists::with('item')
        ->where('order_id', $order_id)
        ->get();

        foreach ($orderItems as $orderItem) {
            $orderItem->item->decrement('child_qty', $orderItem->order_item_qty);
        }

        $completeOrder = ManageOrder::where('id', $order_id)->update(['status' => 1,'bill_no' => $bill_no]);
        $pfdDownloadBtn = '<a href="'.route('admin.download-purchase-bill.pdf',$order_id).'" data-orderid="'.$order_id.'" class="bg-[#007bff] hover:bg-gray-100 text-white p-2 donwloadPurchaseBill">'.__('Purchase Bill').'</a>';
        return response()->json([ 'status' => 'success', 'message' =>"Order Completed Successfully",'data'=>$pfdDownloadBtn ]);
    }
    public function downloadPurchaseBill(Request $request,$id)
    {
        $manageOrder = ManageOrder::with('shippingAddess')->find($id);
        $orderItemLists = OrderItemLists::where('order_id', $id)
                            ->leftjoin('items', 'order_item_lists.order_item_id', '=', 'items.id')
                            ->select('order_item_lists.*', 'items.name as item_name')
                            ->get();
                            
        $pdf = domPDF::loadView('manage-order-request.purchase_bill_download', compact('manageOrder', 'orderItemLists'));
        //$pdf->setPaper('A4', 'portrait');   
        return $pdf->download('Purchase-Bill_'.$manageOrder->bill_no.'.pdf');
    }
}
