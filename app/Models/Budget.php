<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Budget extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'libeaey_budgets';
    protected $fillable = [
        'libraryType',
        'subject',
        'description',
        'totalAmount',
        'CategorieAmount',
    ];
}
