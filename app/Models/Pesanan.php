<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'id_pengguna', 'id_kamar', 'status_pemesanan'
    ];

    use HasFactory;

    public function pengguna(): BelongsTo{
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function kamar(): BelongsTo {
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }
}
