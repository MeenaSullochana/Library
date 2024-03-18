<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Notifications extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'notifications';
    protected $fillable = [
        'message',
        'from',
        'to',
        'type',
        'status'
    ];
}
