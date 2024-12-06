@extends('base.base_admin')

@section('content')

<section id="overview">
    <h1 class="text-2xl font-bold">Total Overview</h1>
    <div class="flex gap-4 mt-2">
        <div class="stats shadow">
            <div class="stat">
              <div class="stat-title">Jumlah Penghuni</div>
              <div class="stat-value">2</div>
            
              {{-- <button class="btn btn-primary">Lihat</button> --}}
            </div>
        </div>
        <div class="stats shadow">
            <div class="stat">
              <div class="stat-title">Jumlah Kos</div>
              <div class="stat-value">5</div>
              {{-- <button class="btn btn-primary">Lihat</button> --}}
            </div>
        </div>
    
    </div>

</section>

<section id="shortcut" class="mt-8">
    <h1 class="text-2xl font-bold">Shortcut</h1>
    <div class="flex gap-4 mt-2">
        <div>
            <a href="{{ route('admin.form-users') }}" class="btn btn-secondary text-xl font-semibold h-20 w-40">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor" d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4v4a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-4H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h4z" />
                    </g>
                </svg>
                Users
            </a>
        </div>
        <div>
            <a href="{{ route('admin.form-pemilik') }}" class="btn btn-primary text-xl font-semibold h-20 w-40">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor" d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4v4a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-4H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h4z" />
                    </g>
                </svg>
                Kos
            </a>
        </div>
    </div>
    
</section>


@endsection

@section('library-js')
<script>
   
</script>
@endsection
