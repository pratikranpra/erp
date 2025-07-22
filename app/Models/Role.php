<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property $id
 * @property $name
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property modelHasRole[] $modelHasRoles
 * @property roleHasPermission[] $roleHasPermissions
 * @property Tmg2.modelHasRole[] $tmg2.modelHasRoles
 * @property Tmg2.roleHasPermission[] $tmg2.roleHasPermissions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Role extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelHasRoles()
    {
        return $this->hasMany(\App\Models\modelHasRole::class, 'id', 'role_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roleHasPermissions()
    {
        return $this->hasMany(\App\Models\roleHasPermission::class, 'id', 'role_id');
    }
        
}
