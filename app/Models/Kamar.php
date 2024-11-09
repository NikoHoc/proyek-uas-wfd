<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kamar extends Model
{
    use HasFactory;

    public function kos(): BelongsTo {
        return $this->belongsTo(Kos::class);
    }

    public function pesanan(): HasMany {
        return $this->hasMany(Pesanan::class);
    }
}
