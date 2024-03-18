<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Currencytype extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'currency_type';
    protected $fillable = [
       
        'name',
       'status'
    ];
}
