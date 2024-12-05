@extends('base.base_admin')

@section('content')

<section id="back-button">
    <a href="{{ url()->previous() }}" class="btn btn-secondary text-xl font-bold">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
            <path fill="currentColor" d="M16.88 2.88a1.25 1.25 0 0 0-1.77 0L6.7 11.29a.996.996 0 0 0 0 1.41l8.41 8.41c.49.49 1.28.49 1.77 0s.49-1.28 0-1.77L9.54 12l7.35-7.35c.48-.49.48-1.28-.01-1.77" />
        </svg>
        Back    
    </a>    
</section>

<div class="container border rounded-md p-5 mt-5">
    <form action="{{ route('authentication.register') }}" method="POST">
        @csrf 
        <div class="form-control">
            <label class="label">
                <span class="label-text">Pilih tipe akun</span>
            </label>
            <select name="role" class="select select-bordered w-full" required>
                <option value="" disabled selected>Pilih tipe akun</option>
                {{-- @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->nama }}</option>
                @endforeach --}}
            </select>
        </div>
        <div class="form-control mt-4">
            <label class="label">
                <span class="label-text">Username</span>
            </label>
            <input type="text" name="username" placeholder="Masukan Username" class="input input-bordered w-full" required>
        </div>
        <div class="form-control mt-4">
            <label class="label">
                <span class="label-text">Password</span>
            </label>
            <input type="password" id="password" name="password" placeholder="Masukan Password" class="input input-bordered w-full" required>
        </div>
        <div class="form-control mt-4">
            <label class="label">
                <span class="label-text">Confirm Password</span>
            </label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" class="input input-bordered w-full" required>
        </div>
        <div class="form-control mt-4">
            <label class="label">
                <span class="label-text">Nama Kos</span>
            </label>
            <input type="text" name="username" placeholder="Masukan Nama Kos" class="input input-bordered w-full" required>
        </div>
        <div class="form-control mt-4">
            <label class="label">
                <span class="label-text">Jumlah Kamar</span>
            </label>
            <input type="text" name="username" placeholder="Masukan jumlah kamar" class="input input-bordered w-full" required>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary w-full">Tambah Pemilik</button>
        </div>

    </form>
</div>

@endsection

@section('library-js')

@endsection
