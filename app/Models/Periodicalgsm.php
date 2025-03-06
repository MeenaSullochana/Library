<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Periodicalgsm extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'periodicalgsms';
    protected $fillable = [
        'name',
        'status',
     
    ];
}
