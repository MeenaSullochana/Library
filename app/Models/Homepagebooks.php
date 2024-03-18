<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Homepagebooks extends Model
{
    use UUID;

    protected $table = 'homepagebooks';
    protected $fillable = [
        'userType',
        'hidelineTitle',
        'hidelineContent',
        
       
    ];
}
