<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'books';
    protected $fillable = [
        'book_title',
        'subtitle',
        'series',
        'booktag',
        'edition_number',
        'primaryauthor',
        'trans_author',
        'trans_from',
        'type',
        'length',
        'width',
        'breadth',
        'weight',
        'gsm',
        'quality',
        'multicolor',
        'monocolor',
        'pages',
        'isbn',
        'product_code',
        'front_img',
        'back_img',
        'full_img',
        'other_img',
        'place',
        'price',
        'language',
        'others',
        'other_indian',
        'other_foreign',
        'category',
        'description',
        'notes',
        'author_name',
        'author_img',
        'banner_img',
        'product_img',
        'author_description',
        'bookdescription',
        'productdescription',
        'user_type',
        'user_id',
        'book_reviewer_id',
        'book_status',
        'marks',
        'book_procurement_status',
        'reject_message',
        'paper_finishing',
        'currency_type',
        'height_width',
        'negotiation_status', 
        'negotiation_price', 
        'calculated_price', 
        'negotiation_message',
        'final_price', 
        'negotiation_reject_message', 
        'book_active_status',
       'sample_pdf',
       'sample_epub',
       'sample_file'
        
    ];

}