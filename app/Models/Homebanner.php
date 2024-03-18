<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Homebanner extends Model
{
    use UUID;

    protected $table = 'homefooter';
    protected $fillable = [
        'type',
        'bannerImage',
    ];
}
;