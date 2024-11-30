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
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function kamar(): HasMany {
        return $this->hasMany(Kamar::class, 'id_kos');
    }

    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'id_kos');
    }
}
