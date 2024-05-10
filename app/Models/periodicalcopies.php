<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class periodicalcopies extends Model
{
    use HasFactory;

    use UUID;
    protected $table = 'periodicalcopies';
    protected $fillable = [
        'periodicalid',
        'periodicaltitle',
        'copies',
        'status',
        'userid',
        'usertype'
    ];
}
