<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Booksubject extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'book_subject';
    protected $fillable = [
       
        'name',
       'status'
    ];
}
