<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Bookpaperfinishing extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'book_paperfinishing';
    protected $fillable = [
       
        'name',
       'status'
    ];
}
