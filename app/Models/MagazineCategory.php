<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class MagazineCategory extends Model
{
    use UUID;

    protected $table = 'magazine_categories';
    protected $fillable = [
        'name',
        'language',
        'status',
        
       
    ];
}
