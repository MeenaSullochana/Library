<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'magazines';
    protected $fillable = [
        'language',
        'category',
        'periodicity',
        'single_issue_rate',
        'annual_subscription',
        'discount',
        'single_issue_after_discount',
        'annual_cost_after_discount',
        'rni_details',
        'total_pages',
        'total_multicolour_pages',
        'total_monocolour_pages',
        'paper_quality',
        'magazine_size',
        'contact_person',
        'phone',
        'email',
        'address',
        'front_img',
        'back_img',
        'user_type',
        'user_id',
       'sample_pdf',
       
        
    ];
}
