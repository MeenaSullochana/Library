<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Thirukkural extends Model
{
  
    use UUID;
    protected $table = 'thirukkural';
    protected $fillable = [
        'thirukkural',
        'shortDescription',
        'longDescription',
  
        
    ];
}
