<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventParticipant extends Model
{
    use HasFactory;

    public function participant(): BelongsTo {
        return $this->belongsTo(User::class, "participant_id", "id");
    }

    public function event(): BelongsTo {
        return $this->belongsTo(Event::class, "event_id", "id");
    }
}
