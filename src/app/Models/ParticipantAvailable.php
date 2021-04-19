<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int state
 */
class ParticipantAvailable extends Model
{
    use HasFactory;

    protected $fillable = [
        "state"
    ];

    public function getState(): int
    {
        return $this->state;
    }

    public function participant(): BelongsTo {
        return $this->belongsTo(User::class, "participant_id", "id");
    }

    public function date(): BelongsTo {
        return $this->belongsTo(Date::class, "date_id", "id");
    }
}
