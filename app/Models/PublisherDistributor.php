<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class PublisherDistributor extends Authenticatable
{
    use HasFactory;
    use UUID;

    protected $casts = [
        'topTitles' => 'array',
        'topTranslatedBooks' => 'array',
        'awardTitle' => 'array',
        'bookCategories' => 'array',
        'specialCategories' => 'array',
        'language' => 'array',
        'association' => 'array',
        'subsidiary' => 'array',
        'publisher' => 'array',
    ];
}
