<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = true;

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function owner(): HasOne {
        return $this->hasOne(User::class);
    }

    public function dates(): HasMany {
        return $this->hasMany(Date::class);
    }

}
