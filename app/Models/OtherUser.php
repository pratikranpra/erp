<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OtherUser
 *
 * @property $id
 * @property $name
 * @property $registered_address
 * @property $billing_address
 * @property $owner_name
 * @property $owner_phone
 * @property $accountant_name
 * @property $delivery_phone
 * @property $owner_email
 * @property $payment_terms
 * @property $gst_no
 * @property $gst_date
 * @property $discount
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OtherUser extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'registered_address', 'billing_address', 'owner_name', 'owner_phone', 'accountant_name', 'delivery_phone', 'owner_email', 'payment_terms', 'gst_no', 'gst_date', 'discount', 'status'];


}
