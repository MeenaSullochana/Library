<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Announcement extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'announcements';
    protected $fillable = [
        'message',
        'to',
        'attachment',
 
    ];
}
