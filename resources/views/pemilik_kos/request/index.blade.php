@extends('base.base')

@section('content')
<!-- Main Layout -->
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
    <main class="flex-1 p-6">
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

        <!-- Tombol Cari -->
        <div class="flex justify-end p-4">
            <div class="form-control">
                <div class="input-group">
                    <input type="text" placeholder="Cari.." class="input input-bordered" />
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="table-auto w-full text-sm border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">No Kamar</th>
                        <th class="border border-gray-300 px-4 py-2">Username</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Terima</th>
                        <th class="border border-gray-300 px-4 py-2">Batal</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">01</td>
                        <td class="border border-gray-300 px-4 py-2">Adit</td>
                        <td class="border border-gray-300 px-4 py-2">Menunggu Konfirmasi</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="checkbox checkbox-success">
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="checkbox checkbox-error">
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">02</td>
                        <td class="border border-gray-300 px-4 py-2">Ibnu</td>
                        <td class="border border-gray-300 px-4 py-2">Terima</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="checkbox checkbox-success" checked>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="checkbox checkbox-error">
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">69</td>
                        <td class="border border-gray-300 px-4 py-2">Joe</td>
                        <td class="border border-gray-300 px-4 py-2">Batal</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="checkbox checkbox-success">
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="checkbox checkbox-error" checked>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">03</td>
                        <td class="border border-gray-300 px-4 py-2">Mei</td>
                        <td class="border border-gray-300 px-4 py-2">Terima</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="checkbox checkbox-success" checked>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="checkbox checkbox-error">
                        </td>
                    </tr>
                    <!-- Row 5 -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">96</td>
                        <td class="border border-gray-300 px-4 py-2">Alisa</td>
                        <td class="border border-gray-300 px-4 py-2">Menunggu Konfirmasi</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="checkbox checkbox-success">
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="checkbox checkbox-error">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection

@section('library-js')
@endsection
