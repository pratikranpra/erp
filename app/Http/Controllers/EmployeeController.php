<?php

namespace App\Http\Controllers;
use Hash; 

use App\Models\Employee;
use App\Models\Role;
use App\Models\Branch;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $employees  = Employee::with('role')->orderBy('id', 'desc')->paginate();

        return view('employee.index', compact('employees'))
            ->with('i', ($request->input('page', 1) - 1) * $employees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $employee = new Employee();

        // Get Roles
        $roles = new Role();
        $all_roles = Role::all();
        $value = '';

        // Get Branches
        $branches = new Branch();
        $all_branches = Branch::all();
        $branch_value = '';

        return view('employee.create', compact('employee', 'all_roles', 'value', 'all_branches', 'branch_value'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {

        $validated = $request->validated();
        $employeeData = collect($validated)->except('branch_ids')->toArray();
        
        $item = Employee::create($employeeData);
        Log::debug($request);

        // Branch ids
        $new_password = Hash::make($request->plain_password);   
        
        
        Employee::find($item->id)->update(['password' => $new_password]);  

        // Main image
        if ($request->hasFile('attachment')) {
            $mainImage = $request->file('attachment');
            $extension = $mainImage->getClientOriginalExtension(); 
            $mainImageName = Str::random(40) . '_main.' . $extension; 
            $mainImagePath = $mainImage->storeAs('images/users/', $mainImageName, 'public');

            Log::debug('Main Image Path: ' . $mainImagePath);

            Employee::find($item->id)->update(['attachment' => $mainImageName]);
        } else {
            Log::debug('No main image uploaded');
        }

        return Redirect::route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $employee = Employee::find($id);

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $employee = Employee::find($id);

        $roles = new Role();
        $all_roles = Role::all();
        $value = $employee->role_id;

        // Get Branches
        $branches = new Branch();
        $all_branches = Branch::all();
        $branch_value = $employee->branches()->pluck('branches.id')->toArray();
        
        return view('employee.edit', compact('employee', 'all_roles', 'value', 'all_branches', 'branch_value'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $validated = $request->validated();
        $employeeData = collect($validated)->except('branch_ids')->toArray();
        $new_password = Hash::make($request->plain_password);   
        
        $employee->update($employeeData);
        
        // Branch ids
        if($validated['branch_ids']){
            $employee->branches()->sync($validated['branch_ids']);
        }
        Employee::find($employee->id)->update(['password' => $new_password]);    
        // Main image
        if ($request->hasFile('attachment')) {
            $mainImage = $request->file('attachment');
            $extension = $mainImage->getClientOriginalExtension(); 
            $mainImageName = Str::random(40) . '_main.' . $extension; 
            $mainImagePath = $mainImage->storeAs('images/users/', $mainImageName, 'public');

            Log::debug('Main Image Path: ' . $mainImagePath);

            Employee::find($employee->id)->update(['attachment' => $mainImageName]);
        } else {
            Log::debug('No main image uploaded');
        }


        return Redirect::route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Employee::find($id)->delete();

        return Redirect::route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }

    public function status(Request $request, Employee $employee)
    {
        $status_arr = ['active', 'inactive'];
        
        if($request->id > 0 && in_array($request->status, $status_arr)){
            $employee = Employee::find($request->id);
            $employee->update(['status' => $request->status]);
            
            return response()->json([ 'status' => 'success', 'message' => 'Employee updated successfully' ]);
        }else{
            return response()->json([ 'status' => 'error', 'message' => 'Invalid request' ]);
        }
    }
}
