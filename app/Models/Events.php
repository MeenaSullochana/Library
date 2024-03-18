<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use App\Models\Subadmin;
use App\Models\Admin;
class Events extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'events';
    protected $fillable = [
        'eventTitle',
        'contactPersonName',
        'startDate',
        'startTime',
        'clossingDate',
        'clossingTime',
        'email',
        'mobileNumber',
        'location',
        'website',
        'createdBy',
        'district',
        'address',
        'description',
        "comment",
        'creater',
        'status',
        'emergencyContactnName',
        'emergencyMobileNumber',
        'emergencyDesignation'.
        'authorityContactnName'.
        'authorityMobileNumber',
        'authorityDesignation',
        'applyFromDate',
        'applyToDate',
        'totalStall'
    ];
}

