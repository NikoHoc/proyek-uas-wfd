<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_pesan');
            $table->dateTime('tanggal_checkout');
            $table->string('status_pembayaran');
            $table->string('status_pemesanan');
            $table->unsignedBigInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id')->on('pengguna')->onDelete('cascade');
            $table->unsignedBigInteger('id_kamar');
            $table->foreign('id_kamar')->references('id')->on('kamar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
