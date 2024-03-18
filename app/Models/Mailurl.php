<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Mailurl extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'mailurls';
    protected $fillable = [
        'name',
       'status'
    ];
}
