@extends('base.base')

@section('content')
    <div class="container mx-auto py-8">

        <!-- Button home dan pesanan -->
        <div class="flex justify-end space-x-4 mb-6">
            <button class="btn btn-ghost">Home</button>
            <button class="btn btn-ghost">Pemesanan</button>
        </div>


        <!-- Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Card 1 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Gambar -->
                <figure class="h-40 bg-gray-300 flex justify-center items-center">
                    <span class="text-lg font-bold text-gray-700">GAMBAR</span>
                </figure>
                <!-- Isi Kartu -->
                <div class="p-4 bg-gray-100">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-bold">Nama Kos</h3>
                        <!-- Rating Bintang -->
                        <div class="flex items-center text-yellow-500">
                            ⭐⭐⭐⭐⭐
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">Deskripsi singkat</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Gambar -->
                <figure class="h-40 bg-gray-300 flex justify-center items-center">
                    <span class="text-lg font-bold text-gray-700">GAMBAR</span>
                </figure>
                <!-- Isi Kartu -->
                <div class="p-4 bg-gray-100">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-bold">Nama Kos</h3>
                        <!-- Rating Bintang -->
                        <div class="flex items-center text-yellow-500">
                            ⭐⭐⭐⭐⭐
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">Deskripsi singkat</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Gambar -->
                <figure class="h-40 bg-gray-300 flex justify-center items-center">
                    <span class="text-lg font-bold text-gray-700">GAMBAR</span>
                </figure>
                <!-- Isi Kartu -->
                <div class="p-4 bg-gray-100">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-bold">Nama Kos</h3>
                        <!-- Rating Bintang -->
                        <div class="flex items-center text-yellow-500">
                            ⭐⭐⭐⭐⭐
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">Deskripsi singkat</p>
                </div>
            </div>

            <!-- Tambah Card jika di perlukan -->

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
