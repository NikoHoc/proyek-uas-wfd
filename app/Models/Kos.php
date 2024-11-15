<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kos extends Model
{
    use HasFactory;

    public function pengguna(): BelongsTo {
        return $this->belongsTo(Pengguna::class);
    }

    public function kamar(): HasMany {
        return $this->hasMany(Kamar::class);
    }

    public function reviews(): HasMany {
        return $this->hasMany(Review::class);
    }
}
