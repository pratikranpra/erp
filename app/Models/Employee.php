<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Employee extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['email', 'user_pin', 'department', 'sub_department', 'contact', 'home_contact', 'aadhar_no', 'attachment', 'aadhar_name', 'status'];


}
