@extends('base.base')

@section('content')
<!-- Layout -->
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

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-200 p-6">
        @if ($kos)
        <h1 class="text-2xl font-bold mb-6">{{ $kos->name }}</h1>
        <ul class="space-y-4">
            <li><strong>Contact Person:</strong> Nama Orang </li>
            <li><strong>Alamat Kos:</strong> {{ $kos->alamat }}</li>
            <li><strong>Rating:</strong> ⭐⭐⭐⭐</li>
            <li><strong>Catatan tambahan:</strong> -</li>
        </ul>
        <div class="absolute bottom-6">
            <button class="btn btn-ghost flex items-center space-x-2">
                <span>Logout</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 10a7 7 0 1114 0 7 7 0 01-14 0zm7-4a1 1 0 011 1v4a1 1 0 11-2 0V7a1 1 0 011-1zm0 10a1 1 0 100-2 1 1 0 000 2z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        @else
        <p>Kos tidak ditemukan.</p>
        @endif
    </aside>


    <!-- Main Content -->
    <div class="flex-1 p-6">

        <!-- Navbar -->
        <header class="bg-white shadow p-4 border-b">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Tombol Menu -->
                <button
                    class="flex flex-col items-center justify-center w-10 h-6 gap-1.5 bg-white rounded-md hover:bg-gray-200">
                    <span class="block w-7 h-0.5 bg-black rounded-sm"></span>
                    <span class="block w-7 h-0.5 bg-black rounded-sm"></span>
                    <span class="block w-7 h-0.5 bg-black rounded-sm"></span>
                </button>
                <!-- User Info -->
                <span class="text-gray-600 font-medium">User</span>
            </div>
        </header>

        <form action="{{ route('pemilik.laporan.kamar.store', ['id_kos' => $kos->id]) }}" method="POST">
            @csrf <!-- CSRF Token untuk keamanan -->
            <div class="my-6">
                <!-- No Kamar -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nama Kamar</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500"
                        placeholder="Masukkan nomor kamar">
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                    <select id="status" name="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500">
                        <option value="" disabled selected>Pilih status kamar</option>
                        <option value="ready">ready</option>
                    </select>
                </div>

                <!-- Harga Kamar -->
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700 font-medium mb-2">Harga Kamar</label>
                    <input type="number" id="harga" name="harga"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500"
                        placeholder="Masukkan harga kamar">
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi Kamar</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500"
                        placeholder="Tambahkan deskripsi kamar"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class=" bg-gray-700 hover:bg-gray-500 text-white font-medium py-2 px-4 rounded-md">
                        Simpan
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

<form id="logout-form" action="{{ route('authentication.logout') }}" method="POST" style="display: none;">
    @csrf
    <a class="btn btn-primary" href="#" id="logout-link">Logout</a>
</form>
@endsection

@section('library-js')
<script>
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
