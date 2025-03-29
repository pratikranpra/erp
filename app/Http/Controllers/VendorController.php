<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VendorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vendors = Vendor::orderBy('id', 'desc')->paginate(10);

        return view('vendor.index', compact('vendors'))
            ->with('i', ($request->input('page', 1) - 1) * $vendors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vendor = new Vendor();

        return view('vendor.create', compact('vendor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request): RedirectResponse
    {
        Vendor::create($request->validated());

        return Redirect::route('vendors.index')
            ->with('success', 'Vendor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $vendor = Vendor::find($id);

        return view('vendor.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $vendor = Vendor::find($id);

        return view('vendor.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorRequest $request, Vendor $vendor): RedirectResponse
    {
        $vendor->update($request->validated());

        return Redirect::route('vendors.index')
            ->with('success', 'Vendor updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Vendor::find($id)->delete();

        return Redirect::route('vendors.index')
            ->with('success', 'Vendor deleted successfully');
    }

    public function status(Request $request, Vendor $vendor)
    {
        $status_arr = ['active', 'inactive'];
        
        if($request->id > 0 && in_array($request->status, $status_arr)){
            $vendor = Vendor::find($request->id);
            $vendor->update(['status' => $request->status]);
            
            return response()->json([ 'status' => 'success', 'message' => 'Vendor updated successfully' ]);
        }else{
            return response()->json([ 'status' => 'error', 'message' => 'Invalid request' ]);
        }
    }
}
