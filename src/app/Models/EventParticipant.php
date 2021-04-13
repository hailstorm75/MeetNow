<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EventParticipant extends Model
{
    use HasFactory;

    public function participant(): HasOne {
        return $this->hasOne(User::class);
    }

    public function event(): HasOne {
        return $this->hasOne(Event::class);
    }
}
