<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Procurementpaymrnt extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'procurement_paymrnts';
    protected $fillable = [
        'bookId',
        'userId',
        'amount',
        'totalAmount',
        'userType',
        'paymentType',
        'invoiceNumber',
        'userName'
   
    ];
}
