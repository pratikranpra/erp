<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryMasterRequest;
use App\Models\InventoryMaster;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
        $inventoryMasters = InventoryMaster::paginate();
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
        InventoryMaster::create($request->validated());

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
}
