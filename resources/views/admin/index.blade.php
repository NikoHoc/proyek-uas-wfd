@extends('base.base')

@section('content')

<h1>INI admin KOS</h1>
<a href="#" id="logout-link">Logout</a>
<form id="logout-form" action="{{ route('authentication.logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endsection

@section('library-js')
<script>
    document.getElementById('logout-link').addEventListener('click', function (e) {
        e.preventDefault();  // Mencegah redirect langsung
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form logout jika pengguna mengonfirmasi
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>
@endsection
