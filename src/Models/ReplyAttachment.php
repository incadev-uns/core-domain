<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\MediaType;

class ReplyAttachment extends Model
{
    protected $fillable = [
        'ticket_reply_id',
        'type',
        'path',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];

    public function ticketReply(): BelongsTo
    {
        return $this->belongsTo(TicketReply::class);
    }
}
