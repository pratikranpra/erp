<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildItem extends Model
{
    //
    protected $fillable = [
        'parent_item_id',
        'item_id',
        'item_child_qty',
        'item_child_unit',
        'item_child_vendor'
    ];
    protected $table = 'child_items';
}
