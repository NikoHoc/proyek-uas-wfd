@extends('base.base')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-sm p-8 space-y-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center">Login</h1>
        <form action="{{ route('authentication.login') }}" method="POST">
            @csrf 
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Username</span>
                </label>
                <input type="text" name="username" placeholder="Enter your username" class="input input-bordered w-full" required>
            </div>
            <div class="form-control mt-4">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" placeholder="Enter your password" class="input input-bordered w-full" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-neutral w-full">Login</button>
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('authentication.register') }}" class="link link-neutral">Don't have an account? Register</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('library-js')
@endsection
