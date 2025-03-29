<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property $id
 * @property $name
 * @property $parent_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property attribute[] $attributes
 * @property category[] $categories
 * @property category[] $categories
 * @property product[] $products
 * @property attribute[] $attributes
 * @property category[] $categories
 * @property category[] $categories
 * @property product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'parent_id', 'status'];


    /**
     * Get the parent category.
     */
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the name of the parent category.
     * If no parent, return null or a default value.
     */
    public function getParentCategoryNameAttribute()
    {
        // Check if parentCategory exists and return its name
        return $this->parentCategory ? $this->parentCategory->name : '-';
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany(\App\Models\attribute::class, 'id', 'category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(\App\Models\category::class, 'id', 'parent_category_id');
    }
        
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(\App\Models\product::class, 'id', 'category_id');
    }
        
}
