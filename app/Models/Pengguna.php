<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'pengguna';

    public function role(): BelongsTo {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function pesanan(): HasMany {
        return $this->hasMany(Pesanan::class, 'id_pengguna');
    }

    public function kos(): HasMany{
        return $this->hasMany(Kos::class);
    }

    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'id_pengguna');
    }

    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
