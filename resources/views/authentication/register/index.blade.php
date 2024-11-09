@extends('base.base')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center">Register</h1>
        <form action="{{ route('authentication.register') }}" method="POST">
            @csrf 
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Pilih tipe akun</span>
                </label>
                <select name="role" class="select select-bordered w-full" required>
                    <option value="" disabled selected>Pilih tipe akun</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-control mt-4">
                <label class="label">
                    <span class="label-text">Username</span>
                </label>
                <input type="text" name="username" placeholder="Enter your username" class="input input-bordered w-full" required>
            </div>
            <div class="form-control mt-4">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" id="password" name="password" placeholder="Enter your password" class="input input-bordered w-full" required>
            </div>
            <div class="form-control mt-4">
                <label class="label">
                    <span class="label-text">Confirm Password</span>
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" class="input input-bordered w-full" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-full">Register</button>
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('authentication.login') }}" class="link link-primary">Already have account? Sign in</a>
            </div>
        </form>
    </div>
</div>


@endsection

@section('library-js')
<script>
    $('form').on('submit', function(e) {
        e.preventDefault();

        var password = $('#password').val();
        var passwordConfirmation = $('#password_confirmation').val();

        if (password !== passwordConfirmation) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password harus sama!',
            });
            return;
        }

        var formData = $(this).serialize();
        $.ajax({
            url: '{{ route('authentication.register') }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful',
                        text: 'You have registered successfully!',
                    }).then(function() {
                        window.location.href = '{{ route('authentication.login') }}';
                    });
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMessages = '';
                $.each(errors, function(key, value) {
                    errorMessages += value + '\n';
                });
                Swal.fire({
                    icon: 'error',
                    title: 'Registration Failed',
                    text: errorMessages,
                });
            }
        });
    });
</script>
@endsection
