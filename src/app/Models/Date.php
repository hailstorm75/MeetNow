<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Date extends Model
{
    use HasFactory;

    public function getDatetime() {
        return $this->datetime;
    }

    public function getEvent(): HasOne {
        return $this->hasOne(Event::class);
    }

    public function dateParticipants(): HasMany {
        return $this->hasMany(ParticipantAvailable::class);
    }
}
