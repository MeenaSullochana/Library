<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class Distributor extends Authenticatable
{
    use HasFactory;
    use UUID;

    protected $casts = [
        'language' => 'array',
        'publisher' => 'array',
        'subsidiary' => 'array',
    ];
}
