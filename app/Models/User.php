<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property-read string name
 * @property-read string email
 * @method static Builder where(array $array)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'github_id',
    ];

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function createdEvents(): HasMany {
        return $this->hasMany(Event::class);
    }

    public function participatedEvents(): HasMany {
        return $this->hasMany(EventParticipant::class);
    }

    public function dateAvailabilities(): HasMany {
        return $this->hasMany(ParticipantAvailable::class);
    }
}