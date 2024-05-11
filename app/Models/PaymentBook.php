<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class PaymentBook extends Model
{
    use UUID;
    use HasFactory;
    protected $table = 'payment_books';
    protected $fillable = [
        'bookId'
    ];
}
