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
        'rni_details',
        'rniproof',
        'language',
        'title',
        'category',
        'periodicity',
        'single_issue_rate',
        'annual_subscription',
        'discount',
        'single_issue_after_discount',
        'annual_cost_after_discount',
       
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
        'full_img',
        'user_type',
        'user_id',
       'sample_pdf',
       'publisher_name',
       'editor_name',
       'first_issue_year',
       'issue_per_year',
       'every_issue_date',
       'gsm',
       'papertype',
       'paperfinishing',
       'highlights',
       'periodical_short_info',
       'about_editor',
       'country',
       'state',
       'city',
       'district',
       'pincode',
       'official_address',
       'pdf1',
       'pdf2',
       'pdf3',
       'editorprofile',
       'highlightimg',
       'bank_Name',
       'ifsc_Code',
       'ban_Acc_Num',
       'acc_Hol_Nam',
        'periodical_procurement_status',
        'periodical_status'
    ];
    public function librarian() {
        return $this->belongsTo(Librarian::class, 'periodical_reviewer_id');
    }
}
