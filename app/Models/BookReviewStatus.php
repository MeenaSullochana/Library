<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReviewStatus extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'book_review_statuses';
    protected $fillable = [
        'book_id',
        'reviewer_id',
        'reviewertype',
        'mark',
        'remark',
        'review_type',
        
    ];
}
