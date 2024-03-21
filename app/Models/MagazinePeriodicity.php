<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class MagazinePeriodicity extends Model
{
    use UUID;

    protected $table = 'magazine_periodicities';
    protected $fillable = [
        'name',
        'status',
    ];
}
