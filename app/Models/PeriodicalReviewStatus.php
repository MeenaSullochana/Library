<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class PeriodicalReviewStatus extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'periodical_review_statuses';
    protected $fillable = [
        'periodical_id',
        'reviewer_id',
        'reviewertype',
        'mark',
        'remark',
        'review_type',
        'review_remark',
        'category',
    ];

 
}

