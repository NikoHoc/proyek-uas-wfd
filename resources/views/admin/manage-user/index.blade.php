@extends('base.base_admin')

@section('content')
<div class="mx-auto px-4">
    <div class="tabs tabs-boxed mb-4 mt-3">
        <a class="tab tab-active transition duration-300 ease-in-out" data-target="user-table">Users</a>
        <a class="tab transition duration-300 ease-in-out" data-target="pemilik-table">Kos</a>
        <a class="tab transition duration-300 ease-in-out" data-target="penghuni-table">Penghuni</a>
    </div>

    <div id="tab-buttons" class="flex justify-end gap-2"></div>

    <div id="user-table" class="table-section transition-opacity duration-500 ease-in-out">
        <div class="flex gap-2 justify-between mb-2">
            <h1 class="text-2xl font-bold mt-1">User Table</h1>
            <a href="{{ route('admin.form-users') }}" class="btn btn-accent text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor" d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4v4a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-4H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h4z" />
                    </g>
                </svg>
                Users   
            </a>    
        </div>
        
        <table id="userTable" class="table-auto w-full text-left mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Last Updated</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usersData as $index => $user)
                    <tr class="" >
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y - h:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->updated_at)->format('d-m-Y - h:i') }}</td>
                        <td>
                            <a href="{{ route('admin.form-users.edit', $user->id) }}" class="btn btn-secondary btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" />
                                    </g>
                                </svg>
                            </a>
                            <form action="{{ route('admin.manage-users.delete', $user->id) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-white" style="background-color: #E74C3C">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                                        <path fill="currentColor" d="M13.5 6.5V7h5v-.5a2.5 2.5 0 0 0-5 0m-2 .5v-.5a4.5 4.5 0 1 1 9 0V7H28a1 1 0 1 1 0 2h-1.508L24.6 25.568A5 5 0 0 1 19.63 30h-7.26a5 5 0 0 1-4.97-4.432L5.508 9H4a1 1 0 0 1 0-2zM9.388 25.34a3 3 0 0 0 2.98 2.66h7.263a3 3 0 0 0 2.98-2.66L24.48 9H7.521zM13 12.5a1 1 0 0 1 1 1v10a1 1 0 1 1-2 0v-10a1 1 0 0 1 1-1m7 1a1 1 0 1 0-2 0v10a1 1 0 1 0 2 0z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="pemilik-table" class="table-section hidden transition-opacity duration-500 ease-in-out">
        <div class="flex gap-2 justify-between mb-2">
            <h1 class="text-2xl font-bold mt-1">Kos Table</h1>
            <a href="{{ route('admin.form-pemilik') }}" class="btn btn-accent text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor" d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4v4a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-4H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h4z" />
                    </g>
                </svg>
                Kos   
            </a>    
        </div>
        <table id="pemilikTable" class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Kos</th>
                    <th>Nama Kos</th>
                    <th>Alamat Kos</th>
                    <th>Jumlah Kamar</th>
                    <th>Pemilik</th>
                    <th>Total Review</th>
                    <th>Created At</th>
                    <th>Last Updated</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kosData as $index => $k)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $k['id'] }}</td>
                        <td>{{ $k['nama_kos'] }}</td>
                        <td>{{ $k['alamat_kos'] }}</td>
                        <td>{{ $k['jumlah_kamar'] }}</td>
                        <td>{{ $k['pemilik'] }}</td>
                        <td>{{ $k['total_review'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($k['created_at'])->format('d-m-Y - h:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($k['updated_at'])->format('d-m-Y - h:i') }}</td>
                        <td>
                            <a href="{{ route('admin.form-users.edit', $k['id']) }}" class="btn btn-secondary btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" />
                                    </g>
                                </svg>
                            </a>
                            <form action="{{ route('admin.manage-users.delete', $k['id']) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-white" style="background-color: #E74C3C">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                                        <path fill="currentColor" d="M13.5 6.5V7h5v-.5a2.5 2.5 0 0 0-5 0m-2 .5v-.5a4.5 4.5 0 1 1 9 0V7H28a1 1 0 1 1 0 2h-1.508L24.6 25.568A5 5 0 0 1 19.63 30h-7.26a5 5 0 0 1-4.97-4.432L5.508 9H4a1 1 0 0 1 0-2zM9.388 25.34a3 3 0 0 0 2.98 2.66h7.263a3 3 0 0 0 2.98-2.66L24.48 9H7.521zM13 12.5a1 1 0 0 1 1 1v10a1 1 0 1 1-2 0v-10a1 1 0 0 1 1-1m7 1a1 1 0 1 0-2 0v10a1 1 0 1 0 2 0z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="penghuni-table" class="table-section hidden transition-opacity duration-500 ease-in-out">
        <div class="flex gap-2 justify-between mb-2">
            <h1 class="text-2xl font-bold mt-1">Penghuni Table</h1>
            <a href="{{ route('admin.form-users') }}" class="btn btn-accent text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor" d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4v4a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-4H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h4z" />
                    </g>
                </svg>
                Penghuni   
            </a>    
        </div>
        <table id="penghuniTable" class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Total Pesanan</th>
                    <th>Total Review</th>
                    <th>Created At</th>
                    <th>Last Updated</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penghuniData as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->username }}</td>
                        <td>{{ $p->pesanan_count }}</td>
                        <td>{{ $p->reviews_count }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d-m-Y - h:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->updated_at)->format('d-m-Y - h:i') }}</td>
                        <td>
                            <a href="{{ route('admin.form-users.edit', $p->id) }}" class="btn btn-secondary btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" />
                                    </g>
                                </svg>
                            </a>
                            <form action="{{ route('admin.manage-users.delete', $p->id) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-white" style="background-color: #E74C3C">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                                        <path fill="currentColor" d="M13.5 6.5V7h5v-.5a2.5 2.5 0 0 0-5 0m-2 .5v-.5a4.5 4.5 0 1 1 9 0V7H28a1 1 0 1 1 0 2h-1.508L24.6 25.568A5 5 0 0 1 19.63 30h-7.26a5 5 0 0 1-4.97-4.432L5.508 9H4a1 1 0 0 1 0-2zM9.388 25.34a3 3 0 0 0 2.98 2.66h7.263a3 3 0 0 0 2.98-2.66L24.48 9H7.521zM13 12.5a1 1 0 0 1 1 1v10a1 1 0 1 1-2 0v-10a1 1 0 0 1 1-1m7 1a1 1 0 1 0-2 0v10a1 1 0 1 0 2 0z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('library-js')
<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            language: {
                searchPlaceholder: "Cari User", 
            }
        });
        $('#pemilikTable').DataTable({
            language: {
                searchPlaceholder: "Cari Pemilik", 
            }
        });
        $('#penghuniTable').DataTable({
            language: {
                searchPlaceholder: "Cari Penghuni", 
            }
        });

        // Tabs logic
        $('.tab').on('click', function () {
            const target = $(this).data('target');

            $('.tab').removeClass('tab-active');
            $(this).addClass('tab-active');

            $('.table-section').addClass('opacity-0');
            setTimeout(() => {
                $('.table-section').addClass('hidden');
                $(`#${target}`).removeClass('hidden'); 
                setTimeout(() => {
                    $(`#${target}`).removeClass('opacity-0');
                }, 50);
            }, 300);
        });

        $(".toggle-password").on("click", function () {
            const passwordInput = $(this).siblings(".password-input");

            if (passwordInput.attr("type") === "password") {
                passwordInput.attr("type", "text");
                $(this).find(".eye-icon").attr("data-icon", "mdi:eye-off-outline");
            } else {
                passwordInput.attr("type", "password");
                $(this).find(".eye-icon").attr("data-icon", "mdi:eye-outline");
            }
        });

        // SweetAlert for Delete Confirmation
        $('.delete-form').on('submit', function(event) {
            event.preventDefault();
            let form = $(this);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.off('submit').submit();
                }
            });
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    });
</script>
@endsection
