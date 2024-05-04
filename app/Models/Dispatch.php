<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Dispatch extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'dispatches';
    protected $fillable = [
             'magazine_id',
           'subscription_id',
           'expected_date',
           'order_id',
            'library_id',
            'received_id',
            'pending_id',
            'not_received_id',
           'status',
           'magazine_name',
           'periodicity'
    ];
}
