<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerShippingAddress;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Vendor;
use Illuminate\Http\Request;

class commonConstroller extends Controller
{
    //
    function itemData($employee_id = 0, $select_item = null)  
    {   
        $product_type = ['ready' => 'Ready made', 'mfg' => 'Manufactured'];

        $units = Unit::query()->select('id','name')->where('status', 'active')->get();
        $vendors = Vendor::query()->select('id','name')->where('status', 'active')->get();
        $items =Item::query()->select('id','name')->where('employee_id','=',$employee_id)->where('status', 'active')->get();
        $rand_num = rand(1000, 9999);
        $html = view('item.item_form',compact('items','units','vendors','rand_num','select_item'))->render(); // Renders the view into HTML
        return $html;    
        // return response()->json([
        //     'status' => 'success',
        //     'html' => $html
        // ]);
        //return "hello from common controller";    
    }

    public function loadCustomerShippingAddress($customerId)
    {
        $rand_num = rand(1000, 9999);
        $customerShippingAddresses = CustomerShippingAddress::where('customer_id', $customerId)->get();
        if($customerShippingAddresses->isEmpty()) {
            $html = "";
        }else{
            $html = view('customer.shipping_address', compact('customerShippingAddresses','rand_num'))->render();
        }
        
        return $html;
    }

    function itemOrderData($employee_id = 0, $select_item = null)  
    {   
        $employee_id = employee_id();
        if($employee_id > 0){
            $items = Item::query()->select('id','child_qty','rate','unit','discount','name')->where('employee_id','=',$employee_id)->where('status', 'active')->get();
        }else{
            $items =Item::query()->select('id','child_qty','rate','unit','discount','name')->where('status', 'active')->get();
        }
        $rand_num = rand(1000, 9999);
        $html = view('manage-order.item_form',compact('items','rand_num'))->render(); // Renders the view into HTML
        return $html;    
        // return response()->json([
        //     'status' => 'success',
        //     'html' => $html
        // ]);
        //return "hello from common controller";    
    }
}
