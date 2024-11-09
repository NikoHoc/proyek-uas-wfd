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
<body>
    {{-- @include('includes.navbar') --}}


    @yield('content')


    {{-- @include('includes.footer') --}}
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Data table -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    @vite(['resources/js/app.js'])
    @yield('library-js')
</body>
</html>