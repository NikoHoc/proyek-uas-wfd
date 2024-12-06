@extends('base.base')

@section('content')
<!-- Layout -->
<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-200 p-6">
        @foreach ($kos as $item)
        <h1 class="text-2xl font-bold mb-6">{{ $item->name }}</h1>
        <ul class="space-y-4">
            <li><strong>Contact Person:</strong> Nama Orang </li>
            <li><strong>Alamat Kos:</strong> {{ $item->alamat }}</li>
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
        @endforeach
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


        <div class="flex justify-between items-center mb-6 mt-6">
            <a href="{{ url('/pemilik_kos/laporan/addKamar') }}" class="btn btn-neutral">ADD KAMAR</a>
            <!-- Search Bar -->
            <div class="form-control">
                <div class="input-group">
                    <input type="text" placeholder="Cari.." class="input input-bordered " />
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto border-collapse border border-gray-300 w-full text-sm">
                <thead>
                    <tr class="bg-gray-300">
                        <th class="border border-gray-300 px-4 py-2 text-left">ID Kamar</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">No Kamar</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Harga</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">1</td>
                        <td class="border border-gray-300 px-4 py-2">01</td>
                        <td class="border border-gray-300 px-4 py-2">Dipesan</td>
                        <td class="border border-gray-300 px-4 py-2">Rp 15.000.000</td>
                        <td class="border border-gray-300 px-4 py-2">-</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">2</td>
                        <td class="border border-gray-300 px-4 py-2">02</td>
                        <td class="border border-gray-300 px-4 py-2">Kosong</td>
                        <td class="border border-gray-300 px-4 py-2">Rp 15.000.000</td>
                        <td class="border border-gray-300 px-4 py-2">-</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">3</td>
                        <td class="border border-gray-300 px-4 py-2">03</td>
                        <td class="border border-gray-300 px-4 py-2">Dipesan</td>
                        <td class="border border-gray-300 px-4 py-2">Rp 15.000.000</td>
                        <td class="border border-gray-300 px-4 py-2">-</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">4</td>
                        <td class="border border-gray-300 px-4 py-2">69</td>
                        <td class="border border-gray-300 px-4 py-2">Kosong</td>
                        <td class="border border-gray-300 px-4 py-2">Rp 15.000.000</td>
                        <td class="border border-gray-300 px-4 py-2">-</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">5</td>
                        <td class="border border-gray-300 px-4 py-2">96</td>
                        <td class="border border-gray-300 px-4 py-2">Dipesan</td>
                        <td class="border border-gray-300 px-4 py-2">Rp 15.000.000</td>
                        <td class="border border-gray-300 px-4 py-2">-</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

@section('library-js')
@endsection
