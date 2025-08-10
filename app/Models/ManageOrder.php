<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ManageOrder
 *
 * @property $id
 * @property $customer_id
 * @property $employee_id
 * @property $sku
 * @property $order_date
 * @property $delivery_date
 * @property $remark
 * @property $product_type
 * @property $shipping_address_id
 * @property $shopping_mode
 * @property $transporter
 * @property $charge
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ManageOrder extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['customer_id', 'employee_id', 'sku', 'order_date', 'delivery_date', 'remark', 'product_type', 'shipping_address_id', 'shopping_mode', 'transporter', 'charge', 'status'];

    public function customerData()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id', 'id');
    }
    public function getCustomerName()
    {
        // Check if parentCategory exists and return its name
        return $this->customerData ? $this->customerData->name : '-';
    }

    public function shippingAddess()
    {
        // Assuming you have an Employee model and a relationship defined
       return $this->belongsTo(\App\Models\CustomerShippingAddress::class, 'shipping_address_id', 'id');
    }
    public function getShippingAddress()
    {
        // Check if parentCategory exists and return its name
        return $this->shippingAddess ? $this->shippingAddess->address : '-';
    }
    
    public function employeeData()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id', 'id');
    }
    public function getEmployeeName()
    {
        // Check if parentCategory exists and return its name
        return $this->employeeData ? $this->employeeData->email : 'Super Admin';
    }
}
