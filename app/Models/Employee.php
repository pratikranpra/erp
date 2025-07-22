<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class Employee
 *
 * @property $id
 * @property $email
 * @property $user_pin
 * @property $department
 * @property $sub_department
 * @property $contact
 * @property $home_contact
 * @property $aadhar_no
 * @property $attachment
 * @property $aadhar_name
 * @property $status
 * @property $updated_at
 * @property $created_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Authenticatable
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['email', 'password', 'user_pin', 'department', 'sub_department', 'contact', 'home_contact', 'aadhar_no', 'attachment', 'aadhar_name', 'status', 'role_id', 'branch_ids'];
    protected $hidden   = ['password'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branchDetails()
    {
        return $this->hasMany(\App\Models\Branch::class, 'id', 'branch_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roleDetails()
    {
        return $this->hasOne(\App\Models\Role::class, 'id', 'role_id');
    }

     /**
     * Get the parent category.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Get the name of the parent category.
     * If no parent, return null or a default value.
     */
    public function getRoleNameAttribute()
    {
        // Check if Role exists and return its name
        return $this->role ? $this->role->name : '-';
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'employee_branches', 'employee_id', 'branch_id')->withTimestamps();
    }

}
