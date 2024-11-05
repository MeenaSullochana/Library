<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Reviewer;
use App\Models\Book;


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

    public function reviewer()
    {
        return $this->belongsTo(Reviewer::class, 'reviewer_id', 'id');
    }
    public function Book() {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
