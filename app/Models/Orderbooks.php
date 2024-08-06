<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Orderbooks extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'orderbooks';
    protected $fillable = [
        'librarianid',
        'budgetid',
        'balanceAmount',
        'bookProduct',
        'libraryType', 
        'libraryid',
        'totalBudget',
        'totalPurchased',
        'totalBal',
        'status'
    ];
}
