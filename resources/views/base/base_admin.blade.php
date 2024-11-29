<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    @vite('resources/css/app.css')  
    @yield('library-css')
    <title>WFD KOS</title>
</head>
<body class="h-full">
    <div class="flex h-full">
        <!-- Sidebar -->
        @include('layouts.admin_sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            @include('layouts.admin_navbar')

            <!-- Page Content -->
            <main class="bg-gray-100 p-4 w-full">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Data table -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>


    @vite(['resources/js/app.js'])
    @yield('library-js')
    <script>
        $(document).ready(function () {
            $('#toggle-sidebar').on('click', function () {
                const sidebar = $('#sidebar');
                const navTitles = $('.menu-label');
                const mainContent = $('.main-content');

                sidebar.toggleClass('w-64 w-16');

                if (sidebar.hasClass('w-16')) {
                    navTitles.addClass('hidden');
                } else {
                    navTitles.removeClass('hidden');
                }
            });

            $('#logout-link').on('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, logout!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#logout-form').submit();
                    }
                });
            });
        });

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ session('redirectUrl') }}';
                }
            });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        @endif
    </script>
</body>
</html>