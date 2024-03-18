<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Newsfeed extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'news_feeds';
    protected $fillable = [
        'newsFeed',
 
    ];
}
