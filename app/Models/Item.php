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
class Item extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['sku', 'name', 'description', 'category_id', 'subcategory_id', 'unit', 'weight', 'gst', 'rate', 'discount', 'child_qty', 'product_type', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ItemCategory()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ItemSubCategory()
    {
        return $this->belongsTo(\App\Models\Category::class, 'subcategory_id', 'id');
    }

    public function getParentCategoryNameAttribute()
    {
        // Check if parentCategory exists and return its name
        return $this->ItemCategory ? $this->ItemCategory->name : '-';
    }

    public function getParentSubcategoryNameAttribute()
    {
        // Check if parentCategory exists and return its name
        return $this->ItemSubCategory ? $this->ItemSubCategory->name : '-';
    }

    public function customerDetails()
    {
        return $this->hasMany(\App\Models\ItemImages::class, 'id', 'items_id');
    }
    
}
