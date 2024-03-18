<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Events;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subadmin extends Authenticatable
{
    use HasFactory;
    use UUID;

    protected $table = 'sub_admins';
    protected $fillable = [
        'name',
        'userName',
        'designation',
        'postalCode',
        'address',
        'district',
        'email',
        'password',
        'role',
        'mobileNumber',
        'createdBy',
        'subadminImage',
        'status'
    ];

   
}
