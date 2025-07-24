<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $units = Unit::paginate();

        return view('unit.index', compact('units'))
            ->with('i', ($request->input('page', 1) - 1) * $units->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unit = new Unit();
        $all_status = ['active' => 'Active', 'inactive' => 'In-active']; 
        return view('unit.create', compact('unit','all_status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitRequest $request): RedirectResponse
    {
        Unit::create($request->validated());
        $all_status = ['active' => 'Active', 'inactive' => 'In-active'];    
        return Redirect::route('units.index',compact('all_status'))
            ->with('success', 'Unit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $unit = Unit::find($id);

        return view('unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $unit = Unit::find($id);
        $all_status = ['active' => 'Active', 'inactive' => 'In-active'];    
        return view('unit.edit', compact('unit','all_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitRequest $request, Unit $unit): RedirectResponse
    {
        $unit->update($request->validated());

        return Redirect::route('units.index')
            ->with('success', 'Unit updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Unit::find($id)->delete();

        return Redirect::route('units.index')
            ->with('success', 'Unit deleted successfully');
    }

    public function status(Request $request, Unit $unit)
    {
        $status_arr = ['active', 'inactive'];
        
        if($request->id > 0 && in_array($request->status, $status_arr)){
            $unit = Unit::find($request->id);
            $unit->update(['status' => $request->status]);
            
            return response()->json([ 'status' => 'success', 'message' => 'Unit updated successfully' ]);
        }else{
            return response()->json([ 'status' => 'error', 'message' => 'Invalid request' ]);
        }
    }
}
