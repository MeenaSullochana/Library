<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Homefooter extends Model
{
    use UUID;

    protected $table = 'homefooter';
    protected $fillable = [
        'about',
        'address',
        'phoneNumber',
        'faxNumber',
        'email',
        'facebook',
        'twitter',
        'youtube',
        'copyright',
       
    ];
}
