<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Cart extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'carts';
    protected $fillable = [
        'title',
        'image',
        'librarianid',
        'magazineid',
        'amount',
        'quantity',
        'totalAmount',
        'category',
        'status',

    ];
}

  