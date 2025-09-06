<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\ChildItem;
use App\Models\Item;
use App\Models\ItemImage;
use App\Models\Unit;
use Barryvdh\DomPDF\Facade\Pdf as domPDF;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $employee_id = employee_id();
        $item_id = $request->item_id > 0 ? $request->item_id : 0;
        
        if($employee_id > 0){
            $items = Item::with(['imageDetails' => function($query) {
                $query->where('type','=','main')
                    ->orderBy('id', 'asc');  
            }])
            ->where('employee_id','=',$employee_id);
            if($item_id > 0){
                $items = $items->where('id','=',$item_id);
            }
            //$items = $items->orderBy('id', 'desc')->paginate();
            $items_all = Item::with(['imageDetails' => function($query) {
                $query->where('type','=','main')
                    ->orderBy('id', 'asc');  
            }])
            ->where('employee_id','=',$employee_id)->orderBy('id', 'desc')->paginate();
        }else{
            // For admin or other users, show all items
            $items = Item::with(['imageDetails' => function($query) {
                $query->where('type','=','main')
                    ->orderBy('id', 'asc');  
            }]);
            if($item_id > 0){
                $items = $items->where('id','=',$item_id);
            }
           // $items = $items->orderBy('id', 'desc')->paginate();
           $items_all = Item::with(['imageDetails' => function($query) {
                $query->where('type','=','main')
                    ->orderBy('id', 'asc');  
            }])
            ->orderBy('id', 'desc')->paginate();
        }
        if ($request->filled('from_date')) {
            $items->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if ($request->filled('to_date')) {
            $items->whereDate('created_at', '<=', $request->input('to_date'));
        }
        $items = $items->orderBy('id', 'desc')->paginate();
        return view('item.index', compact('items','employee_id','items_all'))
            ->with('i', ($request->input('page', 1) - 1) * $items->perPage());
        // $employee_id = employee_id();
        // if($employee_id > 0){
        //     $items = Item::with(['imageDetails' => function($query) {
        //         $query->where('type','=','main')
        //             ->orderBy('id', 'asc');  
        //     }])
        //     ->where('employee_id','=',$employee_id)->orderBy('id', 'desc')->paginate();
        // }else{
        //     // For admin or other users, show all items
        //     $items = Item::with(['imageDetails' => function($query) {
        //         $query->where('type','=','main')
        //             ->orderBy('id', 'asc');  
        //     }])->orderBy('id', 'desc')->paginate();
        // }
        // return view('item.index', compact('items'))
        //     ->with('i', ($request->input('page', 1) - 1) * $items->perPage());
    }

    public function postItemData(Request $request): View
    {
        $employee_id = employee_id();
        $item_id = $request->item_id > 0 ? $request->item_id : 0;
        if($employee_id > 0){
            $items = Item::with(['imageDetails' => function($query) {
                $query->where('type','=','main')
                    ->orderBy('id', 'asc');  
            }])
            ->where('employee_id','=',$employee_id);
            if($item_id > 0){
                $items = $items->where('id','=',$item_id);
            }
            //$items = $items->orderBy('id', 'desc')->paginate();
        }else{
            // For admin or other users, show all items
            $items = Item::with(['imageDetails' => function($query) {
                $query->where('type','=','main')
                    ->orderBy('id', 'asc');  
            }]);
            if($item_id > 0){
                $items = $items->where('id','=',$item_id);
            }
           // $items = $items->orderBy('id', 'desc')->paginate();
        }
        if ($request->filled('from_date')) {
            $items->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if ($request->filled('to_date')) {
            $items->whereDate('created_at', '<=', $request->input('to_date'));
        }
        $items = $items->orderBy('id', 'desc')->paginate();
        return view('item.index', compact('items','employee_id'))
            ->with('i', ($request->input('page', 1) - 1) * $items->perPage());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $item = new Item();
        $product_type = ['ready' => 'Readymade', 'mfg' => 'Manufactured'];
        $all_cats = Category::where('parent_id', '=', 0)->get();
        $all_subcats = [];
        $all_units_lists = Unit::where('status', '=', "active")->get();
        $child_html = "";
        $employee_id = employee_id();
        return view('item.create', compact('item', 'product_type', 'all_cats', 'all_subcats','employee_id','child_html','all_units_lists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request): RedirectResponse
    {
        // Validate and create the item 
        $item = Item::create($request->validated());
        $product_type = $request->product_type??"ready";  
        $vendorArray = $request->input('item_vendor')??[];
        $vendor_data  = array_values($vendorArray);
        
        if($product_type == 'mfg'){
            //insert in sub item table
            $item_type = $request->item_type;
            foreach($item_type as $key => $type){
                if($type > 0){
                    //Log::debug('Creating Child Item', ['parent_item_id' => $item->id, 'type' => $type, 'qty' => $request->item_child_qty[$key] ?? 0]);
                    // Create a new child item
                    Log::debug('Creating Child Item', ['parent_item_id' => $item->id, 'type' => $type, 'qty' => $request->item_child_qty[$key] ?? 0,
                     'item_unit' => $request->item_unit[$key] ?? 0]);
                    
                    ChildItem::create([
                        'parent_item_id' => $item->id,
                        'item_id' => $type,
                        'item_child_qty'=>$request->item_child_qty[$key] ?? 0,
                        'item_child_unit' => $request->item_unit[$key] ?? 0,
                        //'item_child_vendor' => $vendor_data[$key] ?? 0
                        'item_child_vendor' => implode(",",isset($vendor_data[$key])?$vendor_data[$key]:""),
                    ]);

                    //code for deduct child_qty from parent item
                    $get_parent_item = Item::find($type);
                    if($get_parent_item){
                        $get_parent_item->child_qty = $get_parent_item->child_qty - ($request->item_child_qty[$key] ?? 0);
                        $get_parent_item->save();
                      //  Log::debug('Child quantity deducted from parent item', ['item_id' => $get_parent_item->id, 'new_child_qty' => $get_parent_item->child_qty]);
                    } 
                }
            }
        }
        // Main image
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $extension = $mainImage->getClientOriginalExtension(); 
            $mainImageName = Str::random(40) . '_main.' . $extension; 
            $mainImagePath = $mainImage->storeAs('images/items', $mainImageName, 'public');

            //Log::debug('Main Image Path: ' . $mainImagePath);
            
            ItemImage::create([
                'name'          => $mainImageName,
                'type'    => 'main', 
                'items_id'      => $item->id
            ]);
        } else {
            Log::debug('No main image uploaded');
        }

        // Sub images
        if ($request->hasFile('sub_images')) {
            foreach ($request->file('sub_images') as $file) {
                $extension = $file->getClientOriginalExtension(); 
                $subImageName = Str::random(40) . '_sub.' . $extension; 
                $subImagePath = $file->storeAs('images/items', $subImageName, 'public');

                //Log::debug('Sub Image Path: ' . $subImagePath);
                
                ItemImage::create([
                    'name'          => $subImageName,
                    'type'    => 'sub', 
                    'items_id'      => $item->id
                ]);
            }
        } else {
            Log::debug('No sub images uploaded');
        }

        $employee_id = employee_id();
        $path = $employee_id > 0 ? 'employee.items.index' : 'items.index';
        return Redirect::route($path)
            ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $employee_id = employee_id();
        $item = Item::with('imageDetails')->find($id);
        $child_items = ChildItem::where('parent_item_id', $id)
                        ->join('items', 'child_items.item_id', '=', 'items.id')
                        ->join('vendors', 'child_items.item_child_vendor', '=', 'vendors.id')   
                        ->join('units', 'child_items.item_child_unit', '=', 'units.id')
                        ->select('child_items.*', 'items.name as item_name', 
                                 'vendors.name as vendor_name', 
                                 'units.name as unit_name')
                        ->get();
        return view('item.show', compact('item','employee_id','child_items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $item = Item::find($id);
        $employee_id = $item->employee_id ?? 0;
        $child_items = ChildItem::where('parent_item_id', $id)->get(); 
        $child_html = "";
        if($child_items->count() > 0){
            $commonCont = new commonConstroller();
            foreach($child_items as $child_item){
                $select_item = $child_item;
                //$employee_id = $child_item->employee_id ?? 0;
                $child_html .= $commonCont->itemData($employee_id,$select_item);
            }
            
        }  
        $product_type = ['ready' => 'Ready made', 'mfg' => 'Manufactured'];
        $all_cats = Category::where('parent_id', '=', 0)->get();
        $all_subcats = Category::where('parent_id', '=', $item->category_id)->get();
        $all_units_lists = Unit::where('status', '=', "active")->get();

        return view('item.edit', compact('item', 'product_type', 'all_cats', 'all_subcats','employee_id','child_html','all_units_lists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, Item $item): RedirectResponse
    {
        $parent_item_id = $item->id??0;
        
        $item->update($request->validated());

        ChildItem::where('parent_item_id', $parent_item_id)->delete();   
        $product_type = $request->product_type??"ready";   
        $vendorArray = $request->input('item_vendor')??[];
        $vendor_data  = array_values($vendorArray);
        
        //dd($product_type);
        if($product_type == 'mfg'){
            //insert in sub item table
            $item_type = $request->item_type;
            foreach($item_type as $key => $type){
                if($type > 0){
                    //Log::debug('Creating Child Item', ['parent_item_id' => $item->id, 'type' => $type, 'qty' => $request->item_child_qty[$key] ?? 0]);
                    // Create a new child item
                    // Log::debug('Creating Child Item', ['parent_item_id' => $item->id, 'type' => $type, 'qty' => $request->item_child_qty[$key] ?? 0,
                    //  'item_unit' => $request->item_unit[$key] ?? 0]);
                    // Log::info("message", ['parent_item_id' => $item->id, 'type' => $type, 'qty' => $request->item_child_qty[$key] ?? 0,
                    //  'item_unit' => $request->item_unit[$key] ?? 0]);
                    ChildItem::create([
                        'parent_item_id' => $item->id,
                        'item_id' => $type,
                        'item_child_qty'=>$request->item_child_qty[$key] ?? 0,
                        'item_child_unit' => $request->item_unit[$key] ?? 0,
                        //'item_child_vendor' => $request->item_vendor[$key] ?? 0
                         'item_child_vendor' => implode(",",isset($vendor_data[$key])?$vendor_data[$key]:""),
                    ]);
                }
            }
        }

        // Main image
        if ($request->hasFile('main_image')) {
            ItemImage::where('items_id', $item->id)->where('type',"main")->delete(); 
            $mainImage = $request->file('main_image');
            $extension = $mainImage->getClientOriginalExtension(); 
            $mainImageName = Str::random(40) . '_main.' . $extension; 
            $mainImagePath = $mainImage->storeAs('images/items', $mainImageName, 'public');

            //Log::debug('Main Image Path: ' . $mainImagePath);
            
            ItemImage::create([
                'name'          => $mainImageName,
                'type'    => 'main', 
                'items_id'      => $item->id
            ]);
        } else {
            Log::debug('No main image uploaded');
        }

        // Sub images
        if ($request->hasFile('sub_images')) {
            ItemImage::where('items_id', $item->id)->where('type',"sub")->delete(); 
            foreach ($request->file('sub_images') as $file) {
                $extension = $file->getClientOriginalExtension(); 
                $subImageName = Str::random(40) . '_sub.' . $extension; 
                $subImagePath = $file->storeAs('images/items', $subImageName, 'public');

                //Log::debug('Sub Image Path: ' . $subImagePath);
                
                ItemImage::create([
                    'name'          => $subImageName,
                    'type'    => 'sub', 
                    'items_id'      => $item->id
                ]);
            }
        } else {
            Log::debug('No sub images uploaded');
        }
        
        $employee_id = employee_id();
        $path = $employee_id > 0 ?'employee.items.index' :'items.index';
        return Redirect::route($path)
            ->with('success', 'Item updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Item::find($id)->delete();
        ChildItem::where('parent_item_id', $id)->delete();    
        $employee_id = employee_id();
        $path = $employee_id > 0 ? 'employee.items.index' : 'items.index';
        return Redirect::route($path)
            ->with('success', 'Item deleted successfully');
    }

    public function status(Request $request, Category $category)
    {
        $status_arr = ['active', 'inactive'];
        
        if($request->id > 0 && in_array($request->status, $status_arr)){
            $category = Item::find($request->id);
            $category->update(['status' => $request->status]);
            
            return response()->json([ 'status' => 'success', 'message' => 'Item updated successfully' ]);
        }else{
            return response()->json([ 'status' => 'error', 'message' => 'Invalid request' ]);
        }
    }

    public function loadItemTypeData(Request $request)
    {
        $employee_id = $request->employee_id > 0 ? $request->employee_id : 0;
        $commonCont = new commonConstroller();
        $html = $commonCont->itemData($employee_id);
        return response()->json([ 'status' => 'success', 'message' =>"", 'data' => $html ]);
    }

    public function downloadPDF(Request $request)
    {
        $employee_id = employee_id();
        //$items = Item::with('imageDetails')->orderBy('id', 'desc')->get();
        if($employee_id > 0){
            $items = Item::with('imageDetails')->where('employee_id','=',$employee_id)->orderBy('id', 'desc')->paginate();
        }else{
            // For admin or other users, show all items
            $items = Item::with('imageDetails')->orderBy('id', 'desc')->paginate();
        }
        $pdf = domPDF::loadView('item.donwonload_items', compact('items'));
        //$pdf->setPaper('A4', 'portrait');   
        return $pdf->download('item-lists.pdf');
    }

    public function loadSubCategoryData(Request $request)
    {
        $category_id = $request->category_id > 0 ? $request->category_id : 0;
        $commonCont = new commonConstroller();
        $html = $commonCont->loadSubCategoryData($category_id);
        return response()->json([ 'status' => 'success', 'message' =>"", 'data' => $html ]);
    }
}
