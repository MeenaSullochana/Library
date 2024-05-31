<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Existcategory extends Model
{
    use UUID;

    protected $table = 'existcategories';
    protected $fillable = [
        'librarianid',
        'librarianid',
        'budgetid',
        'category',
       'status'
    ];
}
