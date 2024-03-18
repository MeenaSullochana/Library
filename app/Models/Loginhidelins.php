<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Loginhidelins extends Model
{
    use UUID;

    protected $table = 'loginhidelins_title';
    protected $fillable = [
        'userType',
        'hidelineTitle',
        'hidelineContent',
        
       
    ];
}
