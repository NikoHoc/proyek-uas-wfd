@extends('base.base_admin')

@section('content')
<div class="mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">User Tables</h1>
    
    <div class="tabs tabs-boxed mb-6">
        <a class="tab tab-active" data-target="user-table">Users</a>
        <a class="tab" data-target="pemilik-table">Pemilik</a>
        <a class="tab" data-target="penghuni-table">Penghuni</a>
    </div>

    <div id="user-table" class="table-section">
        <table id="userTable" class="table-auto w-full text-left">
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
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role->nama }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td><button class="btn btn-primary btn-sm">Action</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="pemilik-table" class="table-section hidden">
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
                        <td>{{ $k['created_at'] }}</td>
                        <td>{{ $k['updated_at'] }}</td>
                        <td><button class="btn btn-primary btn-sm">Action</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="penghuni-table" class="table-section hidden">
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
                        <td>{{ $p->created_at }}</td>
                        <td>{{ $p->updated_at }}</td>
                        <td><button class="btn btn-primary btn-sm">Action</button></td>
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
        $('.tab').on('click', function() {
            const target = $(this).data('target');
            $('.tab').removeClass('tab-active');
            $(this).addClass('tab-active');
            $('.table-section').addClass('hidden');
            $(`#${target}`).removeClass('hidden');
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
    });
</script>
@endsection
