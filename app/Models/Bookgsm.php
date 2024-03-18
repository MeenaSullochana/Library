<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Bookgsm extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'book_gsm';
    protected $fillable = [
       
        'name',
       'status'
    ];
}
