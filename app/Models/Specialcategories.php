<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Specialcategories extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'special_categories';
    protected $fillable = [
       
        'name',
       'status'
    ];
}
