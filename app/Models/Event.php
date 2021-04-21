<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

/**
 * @property string id
 * @property string title
 * @property string description
 * @method static Event create(array $array)
 * @method static find(string $id)
 * @method static Builder where(string $string, string $id)
 */
class Event extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $fillable = [
        "id",
        "title",
        "description"
    ];

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function owner(): BelongsTo {
        return $this->belongsTo(User::class, "owner_id", "id");
    }

    public function dates(): HasMany {
        return $this->hasMany(Date::class);
    }

}
