<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Cartbooks extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'cartbooks';
    protected $fillable = [
        'title',
        'image',
        'librarianid',
        'bookid',
        'amount',
        'quantity',
        'totalAmount',
        'category',
        'status',

    ];
}
