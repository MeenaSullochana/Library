<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Subscription extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'subscriptions';
    protected $fillable = [
       'magazine_id',
       'issue_date',
       'end_date',
       'periodicity',
       'created_by',
       'status'
    ];
}
