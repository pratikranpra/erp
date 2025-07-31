<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemLists extends Model
{
    //
    protected $fillable = [
        'order_id',
        'order_item_id',
        'order_item_qty',
        'order_item_unit',
        'order_item_rate',
        'order_item_disc',
        'order_item_custom_data',
    ];
    protected $table = 'order_item_lists';
}
