@extends('base.base')

@section('content')
<div class="container mx-auto py-4">
    <div class="navbar bg-gray-800 rounded-full border">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl text-white">Pemesanan</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-2 text-white">
                <li><a href="/penghuni/index" class="font-bold hover:bg-gray-500">Home</a></li>
                <li><a href="/penghuni/pemesanan/index" class="font-bold hover:bg-gray-500">Pemesanan</a></li>
                <li><a class="btn-ghost font-bold hover:bg-gray-500" href="#" id="logout-link">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="flex items-center justify-center my-32">
        <div class="w-full max-w-screen-lg mx-auto">
            <table class="table-auto w-full border-collapse border border-gray-300 bg-white shadow-md rounded-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 border border-gray-300 text-left">Nama Kos</th>
                        <th class="px-6 py-3 border border-gray-300 text-left">No Kamar</th>
                        <th class="px-6 py-3 border border-gray-300 text-left">Nama Kamar</th>
                        <th class="px-6 py-3 border border-gray-300 text-left">Status</th>
                        <th class="px-6 py-3 border border-gray-300 text-left">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listPesanan as $pesanan)
                    <tr>
                        <td class="px-6 py-3 border border-gray-300">{{ $pesanan->kamar->kos->name }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $pesanan->id_kamar }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $pesanan->kamar->name }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $pesanan->status_pemesanan }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $pesanan->kamar->harga }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('library-js')

@endsection
