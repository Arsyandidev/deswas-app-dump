<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class TicketChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id', 'chat'
    ];

    /**
     * Get the ticket that owns the TicketChat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }
}
