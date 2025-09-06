<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GstMaster
 *
 * @property $id
 * @property $category_id
 * @property $gst_range
 * @property $gst_no
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class GstMaster extends Model
{
    
    protected $perPage = 20;
    protected $table = 'gst_master';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['category_id', 'gst_range_min', 'gst_range_max','gst_price_range_min', 'gst_price_range_max', 'gst_no', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
