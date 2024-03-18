<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class Reviewer extends Authenticatable
{
    use HasFactory,Notifiable;
    use UUID;
    protected $table = 'reviewer';
    protected $fillable = [
        'reviewerType',
        'name',
        'subject',
        'designation',
        'organisationDetails',
        'phoneNumber',
        'email',
        'profileImage',
        'bankName',
        'accountNumber',
        'branch',
        'ifscNumber',
        'password',
        'status',
        'reviewerId',
        'creater',
        'approved_status',
        'libraryType',
        'libraryName',
        'Category'
    ];
}

