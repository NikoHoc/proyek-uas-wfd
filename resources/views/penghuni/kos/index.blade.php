@extends('base.base')

@section('content')
<!-- Main Layout -->
<div class="flex h-screen">
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success ') }}", // Perbaiki dengan menghapus spasi ekstra
            showConfirmButton: false,
            timer: 3000, // Tampilkan selama 3 detik
        });
    </script>
    @endif

    <!-- Sidenav -->
    <aside class="w-128 bg-gray-800 text-white h-full p-4 space-y-4">
        <h1 class="text-4xl font-bold mb-4" id="kos-name">Nama Kos</h1>
        <p><strong>Contact Person:</strong> <span id="kos-contact">Nama Orang</span></p>
        <p><strong>Alamat Kos:</strong> <span id="kos-address">Jl. Contoh No.1</span></p>
        <p><strong>Rating:</strong> <span id="kos-rating">⭐⭐⭐⭐</span></p>
        <p><strong>Catatan:</strong> <span id="kos-notes">Lorem ipsum dolor sit amet.</span></p>


        <!-- Review Card 1 -->
        <div class="card bg-neutral shadow-lg text-white ">
            <div class="card-body">
                <h3 class="card-title">Nama Orang</h3>
                <p>⭐⭐⭐⭐⭐</p>
                <p>"Tempatnya nyaman dan fasilitas lengkap."</p>
            </div>
        </div>


        <div class="card bg-neutral shadow-lg text-white">
            <div class="card-body">
                <h3 class="card-title">Nama Orang</h3>
                <p>⭐⭐⭐⭐</p>
                <p>"Harganya sesuai, lokasi strategis."</p>
            </div>
        </div>

        <div class="card bg-neutral shadow-lg text-white ">
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
        <div class="navbar bg-gray-800 rounded-full border">
            <div class="flex-1">
                <a class="btn btn-ghost text-xl text-white">List Kamar</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-2 text-white">
                    <li><a href="/penghuni/index" class="font-bold hover:bg-gray-500">Home</a></li>
                    <li><a href="/penghuni/pemesanan/index" class="font-bold hover:bg-gray-500">Pemesanan</a></li>
                    <li><a class="btn-ghost font-bold hover:bg-gray-500" href="#" id="logout-link">Logout</a></li>
                </ul>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="flex justify-between mb-6 my-6">
            <div class="form-control w-screen">
                <div class="input-group">
                    <input type="text" placeholder="Search kamar..." class="input input-bordered w-full" />
                </div>
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
                        <!-- Form untuk memesan kamar -->
                        <form action="{{ route('penghuni.kos.pesan', ['kamarId' => $kamar->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-neutral">Pesan</button>
                        </form>
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

    // Ambil kos_id dari sessionStorage
    let kosId = sessionStorage.getItem('kos_id');

    if (kosId) {
        // Kirimkan request ke backend (misalnya menggunakan Fetch atau Ajax)
        fetch(`/kos/${kosId}`)
            .then(response => response.json())
            .then(data => {
                // Tampilkan detail kos pada halaman
                document.querySelector('#kos-name').innerText = data.name;
                document.querySelector('#kos-contact').innerText = data.contact_person;
                document.querySelector('#kos-address').innerText = data.alamat;
                document.querySelector('#kos-rating').innerText = `⭐⭐⭐⭐`;
                document.querySelector('#kos-notes').innerText = data.catatan;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>
@endsection
