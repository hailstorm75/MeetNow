<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = true;
    protected $fillable = [
        "title",
        "description"
    ];

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function owner(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function dates(): HasMany {
        return $this->hasMany(Date::class);
    }

}
