<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Sanctum\HasApiTokens;
class Librarian extends Authenticatable
{
    use HasFactory;
    use UUID;
    protected $table = 'librarians';
    protected $fillable = [
        'libraryType',
        'libraryName',
        'state',
        'district',
        'street',
        'place',
        'taluk',
        'post',
        'pincode',
        'landmark',
        'door_no',
        'Village',
        'librarianName',
        'librarianDesignation',
        'phoneNumber',
        'email',
        'password',
        'status',
        'librarianId',
        'allow_status',
        'checkstatus'
    ];
}
