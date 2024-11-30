@extends('base.base')

@section('content')
<!-- Main Layout -->
<div class="flex h-screen">

    <!-- Sidenav -->
    <aside class="w-128 bg-base-200 h-full p-4 space-y-4">
        <h1 class="text-4xl font-bold mb-4">Nama Kos</h1>
        <p><strong>Contact Person:</strong> Nama Orang</p>
        <p><strong>Alamat Kos:</strong> Jl. Contoh No.1</p>
        <p><strong>Rating:</strong> ⭐⭐⭐⭐</p>
        <p><strong>Catatan:</strong> Lorem ipsum dolor sit amet.</p>

        <!-- Review Card 1 -->
        <div class="card bg-white shadow-lg ">
            <div class="card-body">
                <h3 class="card-title">Nama Orang</h3>
                <p>⭐⭐⭐⭐⭐</p>
                <p>"Tempatnya nyaman dan fasilitas lengkap."</p>
            </div>
        </div>


        <div class="card bg-white shadow-lg">
            <div class="card-body">
                <h3 class="card-title">Nama Orang</h3>
                <p>⭐⭐⭐⭐</p>
                <p>"Harganya sesuai, lokasi strategis."</p>
            </div>
        </div>

        <div class="card bg-white shadow-lg ">
            <div class="card-body">
                <h3 class="card-title">Nama Orang</h3>
                <p>⭐⭐⭐</p>
                <p>"Butuh perbaikan di beberapa fasilitas."</p>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">

        <!-- Button home dan pesanan -->
        <div class="flex justify-end space-x-4 mb-6">
            <button class="btn btn-ghost">Home</button>
            <button class="btn btn-ghost">Pemesanan</button>
        </div>

        <!-- Search Bar -->
        <div class="flex justify-between mb-6">
            <div class="form-control w-3/4">
                <div class="input-group">
                    <input type="text" placeholder="Search kamar..." class="input input-bordered w-full" />
                </div>
            </div>
            <div class="flex space-x-4">
                <button class="btn btn-outline">Ascending</button>
                <button class="btn btn-outline">Descending</button>
                <button class="btn btn-outline">Filter</button>
            </div>
        </div>

        <!-- Room Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($listKamar as $kamar)
            <div class="card bg-white shadow-lg" data-id-kos="{{ $kamar->id_kos }}">
                <figure class="h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-xl font-bold">GAMBAR KAMAR</span>
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $kamar->name }}</h2>
                    <p>Status: {{ $kamar->status }}</p>
                    <p>Harga kamar: Rp{{ number_format($kamar->harga, 0, ',', '.') }}</p>
                    <p>{{ $kamar->deskripsi }}</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Pesan</button>
                    </div>
                </div>
            </div>

            @endforeach
        </div>

    </main>
</div>
@endsection

@section('library-js')
<script>
    // Mengambil ID kos dari sessionStorage dan menampilkannya dalam alert
    document.addEventListener('DOMContentLoaded', function() {
        var kosId = sessionStorage.getItem('kos_id');

        if (kosId) {
            // Ambil elemen kamar yang sesuai
            var kamarCards = document.querySelectorAll('[data-id-kos]');
            kamarCards.forEach(function(card) {
                if (card.dataset.idKos !== kosId) {
                    card.style.display = 'none'; // Sembunyikan kartu kamar yang tidak sesuai
                }
            });
        }
    });
</script>
@endsection
