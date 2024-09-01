<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class SelfNominatedBooks extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'self_nominated_books';
    protected $fillable = [
        'id',
        'book_id',
        'created_by',
        'distributed_by',
        'creater_type',
        'distributor_type',
        'price',
        'percentage',
        'quotation_reason',
        'reject_reason',
        'status',
    ];
}
