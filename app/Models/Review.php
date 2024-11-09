<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    public function pengguna(): BelongsTo {
        return $this->belongsTo(Pengguna::class);
    }

    public function kos(): BelongsTo {
        return $this->belongsTo(Kos::class);
    }
}
