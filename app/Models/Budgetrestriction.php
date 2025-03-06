<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Budgetrestriction extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'budeget_restrictions';
    protected $fillable = [
        'vendor',
        'publication',
        'author',

    ];
}
