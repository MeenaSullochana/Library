<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class bookcopies extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'bookcopies';
    protected $fillable = [
        'bookid',
        'booktitle',
        'copies',
        'status',
        'userid',
        'usertype'
    ];
}



