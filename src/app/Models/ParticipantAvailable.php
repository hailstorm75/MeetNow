<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ParticipantAvailable extends Model
{
    use HasFactory;

    public function getState() {
        return $this->state;
    }

    public function participant(): HasOne {
        return $this->HasOne(User::class);
    }

    public function date(): HasOne {
        return $this->hasOne(Date::class);
    }
}
