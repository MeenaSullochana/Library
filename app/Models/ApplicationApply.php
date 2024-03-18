<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationApply extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'application_apply';
    protected $fillable = [
        'event_id',
        'apply_id',
        'totalStall',
        'status',
        'applicationNumber',
        'allocatedStall'
    ];
 
   
}
