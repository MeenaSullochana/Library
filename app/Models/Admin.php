<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subadmin;
use App\Models\Events;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;
    use UUID;

    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'mobileNumber'
    ];
   
}
