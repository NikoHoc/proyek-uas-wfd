@extends('base.base')

@section('content')
<div class="container mx-auto py-4">
    <div class="navbar bg-gray-800 rounded-full border">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl text-white">Review</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-2 text-white gap-4">
                <li><a href="/penghuni/index" class="font-bold bg-gray-500">Home</a></li>
                <li><a href="/penghuni/pemesanan/index" class="font-bold hover:bg-gray-500">Pemesanan</a></li>
                <li>
                    <form id="logout-form" class="hover:bg-red-500" action="{{ route('authentication.logout') }}" method="POST">
                        @csrf
                        <a class="font-bold " id="logout-link">Logout</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <section id="greet-user">
        <h1 class="text-3xl font-bold mt-5 ">Halo {{ Auth::user()->username }}</h1>
        <h1 class="text-xl font-semibold mt-2 ">Review Form - {{ $kos->name }}</h1>
        <form action="{{ route('penghuni.review', $kos->id ) }}" method="POST">
            @csrf
            <div class="form-control mt-4">
                <label class="label">
                    <span class="label-text">Nama Kos</span>
                </label>
                <input type="text" name="name" value="{{ $kos->name }}" class="input input-bordered w-full" disabled>
            </div>
            <div class="form-control mt-4">
                <label class="label">
                    <span class="label-text">Review</span>
                </label>
                <textarea name="isi" placeholder="Tulis review Anda" class="textarea textarea-bordered w-full" rows="5" required></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-full">Submit Review</button>
            </div>
        </form>
    </section>
    
</div>
@endsection

@section('library-js')
<script>
    
</script>
@endsection
