<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InventoryMaster
 *
 * @property $id
 * @property $item_id
 * @property $in_out_type
 * @property $remark
 * @property $qty
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InventoryMaster extends Model
{
    use SoftDeletes;

    protected $perPage = 20;
    protected $table = 'inventory_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['item_id', 'in_out_type', 'remark', 'qty'];

    public function item() {
        return $this->belongsTo(Item::class,"item_id");
    }

    public function getItemName(): string
    {
        return $this->item->name ?? '';
    }

}
