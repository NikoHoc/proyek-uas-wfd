<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesanan extends Model
{
    use HasFactory;

    public function pengguna(): BelongsTo{
        return $this->belongsTo(Pengguna::class);
    }

    public function kamar(): BelongsTo {
        return $this->belongsTo(Kamar::class);
    }
}
