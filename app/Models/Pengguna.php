<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengguna extends Model
{
    use HasFactory;

    public function role(): BelongsTo {
        return $this->belongsTo(Role::class);
    }

    public function pesanan(): HasMany {
        return $this->hasMany(Pesanan::class);
    }

    public function kos(): HasMany{
        return $this->hasMany(Kos::class);
    }

    public function reviews(): HasMany {
        return $this->hasMany(Review::class);
    }
}
