<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Branch
 *
 * @property $id
 * @property $name
 * @property $address
 * @property $handled_by
 * @property $company_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Company $company
 * @property warehouse[] $warehouses
 * @property warehouse[] $warehouses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Branch extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'address', 'handled_by', 'company_id', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id', 'id');
    }

    /**
     * Get the name of the parent category.
     * If no parent, return null or a default value.
     */
    public function getParentCompanyNameAttribute()
    {
        // Check if parentCategory exists and return its name
        return $this->company ? $this->company->name : '-';
    }
        
}
