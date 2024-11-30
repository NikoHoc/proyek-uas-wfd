@extends('base.base')

@section('content')
<div class="container mx-auto py-8">

    <!-- Button home dan pesanan -->
    <div class="flex justify-end space-x-4 mb-6">
        <button class="btn btn-ghost">Home</button>
        <button class="btn btn-ghost">Pemesanan</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($listKos as $kos)
        <a href="{{ url('/penghuni/kos/index') }}"
            class="card bg-white shadow-lg rounded-lg overflow-hidden"
            onclick="saveKosIdAndRedirect(event, '{{ $kos->id }}')">
            <!-- Gambar -->
            <figure class="h-40 bg-gray-300 flex justify-center items-center">
                <span class="text-lg font-bold text-gray-700">GAMBAR</span>
            </figure>
            <!-- Isi Kartu -->
            <div class="p-4 bg-gray-100">
                <h3 class="text-lg font-bold">{{ $kos->name }}</h3>
                <p class="text-gray-600 text-sm mt-2">{{ $kos->alamat }}</p>
                <p class="text-gray-800 text-sm mt-2">Pemilik ID: {{ $kos->id_pengguna }}</p>
            </div>
        </a>

        @endforeach
    </div>
</div>
</div>

<form id="logout-form" action="{{ route('authentication.logout') }}" method="POST" style="display: none;">
    @csrf
    <a class="btn btn-primary" href="#" id="logout-link">Logout</a>
</form>
@endsection

@section('library-js')
<script>
    function saveKosIdAndRedirect(event, kosId) {
        event.preventDefault(); // Menghentikan aksi default dari klik (navigasi)

        // Menyimpan ID kos ke sessionStorage
        sessionStorage.setItem('kos_id', kosId);

        // Navigasi ke URL setelah ID disimpan
        window.location.href = '/penghuni/kos/index'; // Ganti URL sesuai kebutuhan
    }

    document.getElementById('logout-link').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>
@endsection
