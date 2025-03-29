<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $owner_name
 * @property $contact
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property branch[] $branches
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Company extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'owner_name', 'contact', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany(\App\Models\branch::class, 'id', 'company_id');
    }
    
}
