<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Manualguidelines extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'usermanualguidelines';
    protected $fillable = [
        'usertype',
       'content'
    ];
}
