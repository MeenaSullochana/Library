<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class existMagazine extends Model
{
    use UUID;

    protected $table = 'exist_magazines';
    protected $fillable = [
        'librarianid',
        'librarianid',
        'budgetid',
        'category',
       'status'
    ];
}

