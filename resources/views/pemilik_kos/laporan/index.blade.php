@extends('base.base')

@section('content')
<!-- Layout -->
<div class="flex h-screen">

  <!-- Sidebar -->
  <aside class="bg-gray-800 w-64 h-screen hidden md:block text-white p-6">
    @foreach ($kos as $item)
    <h1 class="text-2xl font-bold mb-6">{{ $item->name }}</h1>
    <ul class="space-y-4">
        <li><strong>Contact Person:</strong> {{ $item->pengguna->username }}  </li>
        <li><strong>Alamat Kos:</strong> {{ $item->alamat }}</li>
        <li><strong>Rating:</strong> ⭐⭐⭐⭐</li>
        <li><strong>Catatan tambahan:</strong> -</li>
    </ul>
    <div class="absolute bottom-6">
        <form id="logout-form" action="{{ route('authentication.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-ghost flex items-center space-x-2 hover:text-white hover:bg-red-600"">
                <span>Logout</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 10a7 7 0 1114 0 7 7 0 01-14 0zm7-4a1 1 0 011 1v4a1 1 0 11-2 0V7a1 1 0 011-1zm0 10a1 1 0 100-2 1 1 0 000 2z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    @endforeach
</aside>


    <!-- Main Content -->
    <div class="flex-1 p-6">

        <!-- Navbar -->
        <header class="bg-white shadow p-4 border-b">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Tombol Menu -->
                <span class="text-gray-600 font-bold text-2xl">Laporan</span>
                <!-- User Info -->
                <span class="text-gray-600 font-bold text-2xl">{{ Auth::user()->username }}</span>
            </div>
        </header>


        <div class="flex justify-between items-center mb-6 mt-6">
             <!-- Tombol Back -->
             <a href="{{ url('/pemilik_kos/index') }}" class="btn btn-neutral">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M16.88 2.88a1.25 1.25 0 0 0-1.77 0L6.7 11.29a.996.996 0 0 0 0 1.41l8.41 8.41c.49.49 1.28.49 1.77 0s.49-1.28 0-1.77L9.54 12l7.35-7.35c.48-.49.48-1.28-.01-1.77" />
                </svg>
                Back    
            </a>
            <!-- Search Bar -->
            <div class="form-control">
                <div class="input-group">
                    <a href="{{ url('/pemilik_kos/laporan/addKamar') }}" class="btn btn-neutral mx-3">ADD KAMAR</a>
                    
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-5">
            <table id="table-laporan" class="table-auto border-collapse border border-gray-300 w-full text-sm">
                <thead>
                    <tr class="bg-gray-300">
                        <th class="border border-gray-300 px-4 py-2 text-left">ID Kamar</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama Kamar</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Harga</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listKamar as $kamar)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $kamar->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $kamar->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $kamar->status }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $kamar->deskripsi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection

@section('library-js')
<script>
    $(document).ready(function() {
        $('#table-laporan').DataTable({
            language: {
                searchPlaceholder: "Cari kamar", 
            }
        });

        $('#logout-form button').on('click', function(e) {
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

                    $('#logout-form').submit();
                }
            });
        });

        $('#submit-kos-button').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin membuat kos ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, buat!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Kos berhasil dibuat.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(() => {
                        $('form').submit();
                    });
                }
            });
        });
    });
</script>
@endsection
