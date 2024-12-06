@extends('base.base')

@section('content')
<!-- Main Layout -->
<div class="flex h-screen">
    @if (session('status'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: "{{ session('status ') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

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
                        <th class="border border-gray-300 px-4 py-2">Nama Kamar</th>
                        <th class="border border-gray-300 px-4 py-2">Username</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Terima</th>
                        <th class="border border-gray-300 px-4 py-2">Tolak</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    @foreach ($pesanan as $order)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $order->kamar->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $order->pengguna->username }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $order->status_pemesanan }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <form action="{{ route('pemilik_kos.request.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Terima">
                                <button type="submit" class="btn btn-success" {{ $order->status_pemesanan == 'Terima' ? 'disabled' : '' }}>
                                    Terima
                                </button>
                            </form>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <form action="{{ route('pemilik_kos.request.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Tolak">
                                <button type="submit" class="btn btn-error" {{ $order->status_pemesanan == 'Tolak' ? 'disabled' : '' }}>
                                    Tolak
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection

@section('library-js')
@endsection
