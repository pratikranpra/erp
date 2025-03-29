<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BranchRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $branches = Branch::with('company')->paginate();

        return view('branch.index', compact('branches'))
            ->with('i', ($request->input('page', 1) - 1) * $branches->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $branch = new Branch();
        $all_companies = Company::all();

        return view('branch.create', compact('branch', 'all_companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request): RedirectResponse
    {
        Branch::create($request->validated());

        return Redirect::route('branches.index')
            ->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $branch = Branch::find($id);

        return view('branch.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $branch = Branch::find($id);
        $all_companies = Company::all();

        return view('branch.edit', compact('branch', 'all_companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchRequest $request, Branch $branch): RedirectResponse
    {
        $branch->update($request->validated());

        return Redirect::route('branches.index')
            ->with('success', 'Branch updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Branch::find($id)->delete();

        return Redirect::route('branches.index')
            ->with('success', 'Branch deleted successfully');
    }

    public function status(Request $request, Branch $branch)
    {
        $status_arr = ['active', 'inactive'];
        
        if($request->id > 0 && in_array($request->status, $status_arr)){
            $branch = Branch::find($request->id);
            $branch->update(['status' => $request->status]);
            
            return response()->json([ 'status' => 'success', 'message' => 'Branch updated successfully' ]);
        }else{
            return response()->json([ 'status' => 'error', 'message' => 'Invalid request' ]);
        }
    }
}
