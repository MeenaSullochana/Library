<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Feedback extends Model
{
    use UUID;

    protected $table = 'feedbacks';
    protected $fillable = [
        'subject',
        'description',
        'userId',
        'userType',
       
    ];
}
