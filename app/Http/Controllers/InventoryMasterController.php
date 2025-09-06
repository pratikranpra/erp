<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryMasterRequest;
use App\Models\InventoryMaster;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Catch_;
use Barryvdh\DomPDF\Facade\Pdf as domPDF;

class InventoryMasterController extends Controller
{
    protected $inOutTypes = [
        1 => 'GRN - Goods received note (In)',
        2 => 'Purchase Return (Out)',
        3 => 'Sale Return (In)',
        4 => 'Production Progress (child - out, parent - in)',
        5 => 'Production completed (child - out, parent - in)',
        6 => 'Transfer In (in)',
        7 => 'Transfer Out (out)',
        8 => 'Stock Adjustment (in / out)',
    ];
    public function __construct(){
        $this->inOutTypes = $this->inOutTypes;
    } 
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $inventoryMasters = InventoryMaster::query();
        if ($request->filled('from_date')) {
            $inventoryMasters->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if ($request->filled('to_date')) {
            $inventoryMasters->whereDate('created_at', '<=', $request->input('to_date'));
        }
        $inventoryMasters = $inventoryMasters->orderBy('id', 'desc')->paginate();
        $inOutTypes_Array = $this->inOutTypes;
        
        return view('inventory-master.index', compact('inventoryMasters','inOutTypes_Array'))
            ->with('i', ($request->input('page', 1) - 1) * $inventoryMasters->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $inventoryMaster = new InventoryMaster();
        $items_lists = Item::with('imageDetails')->orderBy('id', 'desc')->paginate();
        return view('inventory-master.create', compact('inventoryMaster','items_lists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventoryMasterRequest $request): RedirectResponse
    {
        $inventory =  InventoryMaster::create($request->validated());
        if(in_array($inventory->in_out_type,[2,7,8])){
           // dd($inventory->in_out_type);
            $item_id = $inventory->item_id;
            try {
                $item = Item::findOrFail($item_id);
                if ($item->child_qty < $inventory->qty) {
                    throw new \Exception("Not enough stock. Available: {$item->child_qty}, Requested: {$inventory->qty}");
                }
                $item->decrement('child_qty', $inventory->qty);

            } catch (\Exception $e) {
                return Redirect::route('inventory-masters.index')
                    ->with('error', 'Error in updating item stock qty: ' . $e->getMessage());
            }
        }
        return Redirect::route('inventory-masters.index')
            ->with('success', 'InventoryMaster created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $inventoryMaster = InventoryMaster::find($id);
        $inOutTypes_Array = $this->inOutTypes;
        return view('inventory-master.show', compact('inventoryMaster','inOutTypes_Array'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $inventoryMaster = InventoryMaster::find($id);
        $items_lists = Item::with('imageDetails')->orderBy('id', 'desc')->paginate();
        return view('inventory-master.edit', compact('inventoryMaster','items_lists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventoryMasterRequest $request, InventoryMaster $inventoryMaster): RedirectResponse
    {
        $inventoryMaster->update($request->validated());

        return Redirect::route('inventory-masters.index')
            ->with('success', 'InventoryMaster updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        InventoryMaster::find($id)->delete();

        return Redirect::route('inventory-masters.index')
            ->with('success', 'InventoryMaster deleted successfully');
    }

    public function downloadPurchaseInvoice(Request $request,$id)
    {
        $inventory_data = InventoryMaster::where('id', $id)->first();

        $item_data = Item::where('id', $inventory_data->item_id)->get();
        
        if(!$inventory_data || !$item_data){ 
            return redirect()->back()->with('error', 'Inventory record not found.');
        }
        $in_out_type_text="";
        $in_out_type_text_display="";
        if(in_array($inventory_data->in_out_type,[2,7,8])){
            
            if($inventory_data->in_out_type == 2){
                $in_out_type_text = "Purchase_Return_Out";
                $in_out_type_text_display = "Purchase Return (Out)";

            }elseif($inventory_data->in_out_type == 7){
                $in_out_type_text = "Transfer_Out_out";
                $in_out_type_text_display = "Transfer Out (Out)";       
            }elseif($inventory_data->in_out_type == 8){
                $in_out_type_text = "Stock_Adjustment_in_out";
                $in_out_type_text_display = "Stock Adjustment (in / out)";    
            }
        }
        
        $random_number = $in_out_type_text."_".$id."_".time();
        $pdf = domPDF::loadView('inventory-master.purchase_invoice_download', compact('in_out_type_text_display', 'inventory_data','item_data'));
        //$pdf->setPaper('A4', 'portrait');   
        return $pdf->download($random_number.'.pdf');
    }
}
