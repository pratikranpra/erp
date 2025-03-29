<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @property $id
 * @property $sku
 * @property $name
 * @property $description
 * @property $category_id
 * @property $subcategory_id
 * @property $unit
 * @property $weight
 * @property $gst
 * @property $rate
 * @property $discount
 * @property $child_qty
 * @property $product_type
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ItemImage extends Model
{
    
    protected $table = 'items_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'type', 'items_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ItemCategory()
    {
        return $this->belongsTo(\App\Models\Item::class, 'items_id', 'id');
    }
    
    
    public function getParentCategoryNameAttribute()
    {
        // Check if parentCategory exists and return its name
        return $this->ItemCategory ? $this->ItemCategory->name : '-';
    }

}
