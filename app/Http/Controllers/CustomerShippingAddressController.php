<?php

namespace App\Http\Controllers;

use App\Models\CustomerShippingAddress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerShippingAddressRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CustomerShippingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$customer_id): View
    {
           
        $customerShippingAddresses = CustomerShippingAddress::where('customer_id', $customer_id)->paginate();
        return view('customer-shipping-address.index', compact('customerShippingAddresses','customer_id'))
            ->with('i', ($request->input('page', 1) - 1) * $customerShippingAddresses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($customer_id): View
    {
        $customerShippingAddress = new CustomerShippingAddress();
        $all_status = ['active' => 'Active', 'inactive' => 'In-active']; 
        return view('customer-shipping-address.create', compact('customerShippingAddress','all_status','customer_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerShippingAddressRequest $request): RedirectResponse
    {
        //dd($request->all());
        CustomerShippingAddress::create($request->validated());
        $customer_id = $request->input('customer_id');
        $all_status = ['active' => 'Active', 'inactive' => 'In-active'];  
        return Redirect::route('admin.customer-shipping-addresses.index',compact('all_status','customer_id'))
            ->with('success', 'CustomerShippingAddress created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $customerShippingAddress = CustomerShippingAddress::find($id);

        return view('customer-shipping-address.show', compact('customerShippingAddress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($customer_id,$id): View
    {
        $customerShippingAddress = CustomerShippingAddress::find($id);
        $all_status = ['active' => 'Active', 'inactive' => 'In-active'];  
        return view('customer-shipping-address.edit', compact('customerShippingAddress','all_status','customer_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($customer_id,$address,CustomerShippingAddressRequest $request ): RedirectResponse
    {
        $customerShippingAddress = CustomerShippingAddress::find($address);
        $customerShippingAddress->update($request->validated());

        
        $customer_id = $request->input('customer_id');    
        return Redirect::route('admin.customer-shipping-addresses.index', compact('customer_id'))
            ->with('success', 'CustomerShippingAddress updated successfully');
    }

    public function destroy($customer_id,$id): RedirectResponse
    {
        CustomerShippingAddress::find($id)->delete();

        return Redirect::route('admin.customer-shipping-addresses.index',compact('customer_id'))
            ->with('success', 'CustomerShippingAddress deleted successfully');
    }

    public function status(Request $request, CustomerShippingAddress $customer)
    {
        $status_arr = ['active', 'inactive'];
        if($request->id > 0 && in_array($request->status, $status_arr)){
            $customer = CustomerShippingAddress::find($request->id);
            $customer->update(['status' => $request->status]);
            
            return response()->json([ 'status' => 'success', 'message' => 'Customer shipping updated successfully' ]);
        }else{
            return response()->json([ 'status' => 'error', 'message' => 'Invalid request' ]);
        }
    }
}
