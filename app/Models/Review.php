<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $table = 'review';

    protected $fillable = ['isi', 'tanggal_review', 'id_pengguna', 'id_kos'];

    use HasFactory;

    public function pengguna(): BelongsTo {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function kos(): BelongsTo {
        return $this->belongsTo(Kos::class, 'id_kos');
    }
}
