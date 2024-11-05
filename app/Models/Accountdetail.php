<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Accountdetail extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'accountdetails';
    protected $fillable = [
        'pan_num',
        'acc_num',
        'ifsc_code',
        'acc_hol_name',
        'bank_name',
        'acc_type',
        'branch',
        'user_id',
        'user_type',
        'status'
    ];
}
