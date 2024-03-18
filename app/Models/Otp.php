<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Otp extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'otps';
    protected $fillable = [
        'otp',
        'userId',
        'dateTime',
       
    ];
}
