@extends('base.base')

@section('content')
<!-- Layout -->
<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-200 p-6">
        @if (!empty($jumlahKos))
            @foreach ($kos as $item)
            <h1 class="text-2xl font-bold mb-6">{{ $item->name }}</h1>
            <ul class="space-y-4">
                <li><strong>Contact Person:</strong> Nama Orang </li>
                <li><strong>Alamat Kos:</strong> {{ $item->alamat }}</li>
                <li><strong>Rating:</strong> ⭐⭐⭐⭐</li>
                <li><strong>Catatan tambahan:</strong> -</li>
            </ul>
            <div class="absolute bottom-6">
                <form id="logout-form" action="{{ route('authentication.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-ghost flex items-center space-x-2">
                        <span>Logout</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 10a7 7 0 1114 0 7 7 0 01-14 0zm7-4a1 1 0 011 1v4a1 1 0 11-2 0V7a1 1 0 011-1zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
            @endforeach
        @else
        <p>Anda belum memiliki kos, input data kos dulu</p>
        <div class="absolute bottom-6">
            <form id="logout-form" action="{{ route('authentication.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-ghost flex items-center space-x-2">
                    <span>Logout</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 10a7 7 0 1114 0 7 7 0 01-14 0zm7-4a1 1 0 011 1v4a1 1 0 11-2 0V7a1 1 0 011-1zm0 10a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
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
                <span class="text-gray-600 font-medium">{{ Auth::user()->username }}</span>
            </div>
        </header>

        <!-- Main Content -->
        
        <main class="flex items-center justify-center my-60">
            @if (!empty($jumlahKos))
            {{-- Pemilik sudah buat kos --}}
            <div class="flex gap- gap-20">
                <!-- Request Button -->
                <a href="{{ url('/pemilik_kos/request') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-8 px-16 w-[300px] h-[120px] rounded-lg text-2xl">
                    Request
                </a>
                <!-- Laporan Button -->
                <a href="{{ url('/pemilik_kos/laporan') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-8 px-16 w-[300px] h-[120px] rounded-lg text-2xl">
                    Laporan
                </a>
            </div>
            @else
            {{-- Pemilik belum punya kos --}}
            <div class="border rounded-md p-5">
                <h1 class="text-xl font-bold">Anda belum memiliki kos, ayo buat terlebih dahulu!</h1>
                <form method="POST" action="{{ route('kos.add-kos') }}">
                    @csrf 
                    <div class="form-control mt-4">
                        <label class="label">
                            <span class="label-text">Nama Kos</span>
                        </label>
                        <input type="text" name="name" placeholder="Masukan Nama Kos" class="input input-bordered w-full" required>
                    </div>
                    <div class="form-control mt-4">
                        <label class="label">
                            <span class="label-text">Alamat</span>
                        </label>
                        <input type="text" name="alamat" placeholder="Masukan Alamat Kos" class="input input-bordered w-full" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" id="submit-kos-button" class="btn btn-primary w-full">Buat Kos</button>
                    </div>
                </form>
            </div>
            @endif
        </main>
       


    </div>
</div>

{{-- <form id="logout-form" action="{{ route('authentication.logout') }}" method="POST" style="display: none;">
    @csrf
    <a class="btn btn-primary" href="#" id="logout-link">Logout</a>
</form> --}}
@endsection

@section('library-js')
<script>
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
</script>
@endsection
