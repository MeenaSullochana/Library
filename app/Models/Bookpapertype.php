<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Bookpapertype extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'book_papertype';
    protected $fillable = [
       
        'name',
       'status'
    ];
}
