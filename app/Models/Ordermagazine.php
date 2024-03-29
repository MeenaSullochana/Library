<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Ordermagazine extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'ordermagazines';
    protected $fillable = [
        'librarianid',
        'budgetid',
        'balanceAmount',
        'magazineProduct',
        'libraryType', 
        'totalBudget',
        'totalPurchased',
        'totalBal',
        'status'
    ];
}
