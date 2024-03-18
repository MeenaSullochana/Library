<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class HidelinsTitle extends Model
{
    use UUID;

    protected $table = 'hidelins_title';
    protected $fillable = [
        'userType',
        'hidelineTitle',
        'hidelineContent',
        
       
    ];
}
