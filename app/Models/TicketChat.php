<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use App\Traits\UUID;
class TicketChat extends Model
{
    use HasFactory;
    use UUID;
    protected $table = 'ticket_chats';
    protected $fillable = [
        'from',
        'to',
        'message',
        'status',
        'ticket_Id',
        'readStatus',
        
    ];
    public function ticketchat(){
        return $this->hasMany(Ticket::class);
    }
}
