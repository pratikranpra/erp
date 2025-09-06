<?php

namespace App\Http\Controllers;

use App\Models\GstMaster;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GstMasterRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GstMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $gstMasters = GstMaster::orderBy('id', 'desc')->paginate();

        return view('gst-master.index', compact('gstMasters'))
            ->with('i', ($request->input('page', 1) - 1) * $gstMasters->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $gstMaster = new GstMaster();
        
        // Get Categories
        $categories = new Category();
        $all_categories = Category::all();
        $value = '';

        return view('gst-master.create', compact('gstMaster', 'all_categories', 'value'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GstMasterRequest $request): RedirectResponse
    {
        GstMaster::create($request->validated());

        return Redirect::route('gst-masters.index')
            ->with('success', 'GstMaster created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $gstMaster = GstMaster::find($id);

        return view('gst-master.show', compact('gstMaster'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $gstMaster = GstMaster::find($id);

        // Get Categories
        $categories = new Category();
        $all_categories = Category::all();
        $value = $gstMaster->category_id;

        return view('gst-master.edit', compact('gstMaster', 'all_categories', 'value'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GstMasterRequest $request, GstMaster $gstMaster): RedirectResponse
    {
        //dd($request->all());
        $gstMaster->update($request->validated());

        return Redirect::route('gst-masters.index')
            ->with('success', 'GstMaster updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        GstMaster::find($id)->delete();

        return Redirect::route('gst-masters.index')
            ->with('success', 'GstMaster deleted successfully');
    }

    public function status(Request $request, GstMaster $gstMaster)
    {
        $status_arr = ['a', 'd'];
        
        if($request->id > 0 && in_array($request->status, $status_arr)){
            $gstMaster = GstMaster::find($request->id);
            $gstMaster->update(['status' => $request->status]);
            
            return response()->json([ 'status' => 'success', 'message' => 'Employee updated successfully' ]);
        }else{
            return response()->json([ 'status' => 'error', 'message' => 'Invalid request' ]);
        }
    }
}
