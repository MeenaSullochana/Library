<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class LibraryType extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'library_types';
    protected $fillable = [
       
        'name',
       'status'
    ];
}
