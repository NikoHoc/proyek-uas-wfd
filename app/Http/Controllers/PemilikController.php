<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use App\Models\Pengguna;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikController extends Controller
{
    // public function index()
    // {
    //     return view('pemilik_kos.index');
    // }

    public function showKos()
    {
        $pengguna = Auth::user();
        $idPengguna = $pengguna->id;

        $kos = Kos::query()->where('id_pengguna', $idPengguna)->get();
        $jumlahKos = $kos->count();

        // // Mengambil data kos berdasarkan id pengguna 4
        // $kos = Kos::query()
        //     ->where('id_pengguna', 4) // Sesuaikan nama kolom 'user_id' dengan skema database Anda
        //     ->get();

        // Kirim data ke view
        return view('pemilik_kos.index', [
            "kos" => $kos,
            "jumlahKos" => $jumlahKos,
        ]);
    }

    public function addKos(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        // Tambahkan data ke tabel 'kos'
        Kos::create([
            'name' => $validated['name'],
            'alamat' => $validated['alamat'],
            'id_pengguna' => Auth::user()->id, // Ambil ID pengguna login
        ]);

        // Redirect ke halaman kos dengan pesan sukses
        return redirect()->route('pemilik.index')->with('success', 'Kos berhasil dibuat!');
    }

    public function indexRequest()
    {
        // Mengambil ID user yang sedang login
        $username = Auth::id(); // Atau Auth::user()->id
        $userId = Pengguna::query()->where('username', $username)->first()->id;

        $kos = Kos::query()
            ->where('id_pengguna', $userId) // Sesuaikan nama kolom 'user_id' dengan skema database Anda
            ->get();

        // Mengambil pesanan yang terkait dengan kos yang dimiliki oleh pengguna
        $pesanan = Pesanan::query()
            ->whereHas('kamar', function ($query) use ($kos) {
                // Menyaring kamar berdasarkan kos yang dimiliki pengguna
                $query->whereIn('id_kos', $kos->pluck('id'));
            })
            ->get();

        return view('pemilik_kos.request.index', [
            "kos" => $kos,
            "pesanan" => $pesanan,
        ]);
    }

    public function indexLaporan()
    {
        // Mengambil ID user yang sedang login
        $username = Auth::id(); // Atau Auth::user()->id
        $userId = Pengguna::query()->where('username', $username)->first()->id;

        // Mengambil data kos berdasarkan id pengguna
        $kos = Kos::query()
            ->where('id_pengguna', $userId) // Sesuaikan nama kolom 'user_id' dengan skema database Anda
            ->get();

        // Mengambil semua ID kos yang sesuai dengan id_pengguna
        $kosIds = $kos->pluck('id'); // Mengambil daftar ID kos dalam bentuk array

        // Mengambil data kamar berdasarkan id_kos yang sesuai
        $listKamar = Kamar::query()
            ->whereIn('id_kos', $kosIds) // Mencocokkan id_kos dengan list ID kos
            ->get();

        return view('pemilik_kos.laporan.index', [
            "kos" => $kos,
            'listKamar' => $listKamar
        ]);
    }

    public function addKamar()
    {
        // Mengambil ID user yang sedang login
        $username = Auth::id(); // Atau Auth::user()->id
        $userId = Pengguna::query()->where('username', $username)->first()->id;

        // Mengambil data kos pertama berdasarkan id pengguna
        $kos = Kos::query()
            ->where('id_pengguna', $userId)
            ->first();

        // Pastikan kos ditemukan
        if (!$kos) {
            return redirect()->back()->with('error', 'Kos tidak ditemukan');
        }

        return view('pemilik_kos.laporan.addKamar.index', [
            "kos" => $kos // Kirimkan objek kos
        ]);
    }


    public function storeKamar(Request $request, $id_kos)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string|max:255',
        ]);

        // Simpan data kamar ke dalam database
        $kamar = new Kamar();
        $kamar->name = $validated['name'];
        $kamar->status = $validated['status'];
        $kamar->harga = $validated['harga'];
        $kamar->deskripsi = $validated['deskripsi'];
        $kamar->id_kos = $id_kos;
        $kamar->save();

        // Redirect atau tampilkan pesan sukses
        return back()->with('success', 'Kamar berhasil disimpan!');
    }

    public function updateStatus(Request $request, $id)
    {
        // Cari pesanan berdasarkan ID
        $pesanan = Pesanan::findOrFail($id);

        // Perbarui status pesanan berdasarkan input
        if ($request->has('status')) {
            $pesanan->status_pemesanan = $request->input('status');
            $pesanan->save(); // Simpan perubahan status

            $kamar = $pesanan->kamar;
            if ($kamar) {
                $kamar->status = 'booked';
                $kamar->save();
            }
        }

        // Kirimkan pesan sukses untuk ditampilkan di view
        return redirect()->back()->with('status', 'Status pemesanan berhasil diperbarui');
    }
}
