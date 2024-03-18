<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use App\Models\TicketChat;

class Ticket extends Model
{
    use HasFactory;
    use UUID;

    protected $table = 'tickets';
    protected $fillable = [
        'district',
        'subject',
        'description',
        'userId',
        'subAdminId',
        'user',
        'subAdmin',
        'status',
        'ticketType'
    ];
    public function ticketchat(){
        return $this->hasMany(TicketChat::class);
    }
}
