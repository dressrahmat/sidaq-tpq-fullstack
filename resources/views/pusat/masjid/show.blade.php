@extends('main.app')
@section('content')
<div class="p-3 flex gap-4 h-full">
    <div class="card card-side bg-base-100 shadow-xl w-2/5">
        <div class="card-body p-2">
            <div class="my-2">
                <a href="{{route('masjid.index')}}" class="btn btn-neutral btn-sm">Kembali</a>
            </div>
            <h6 class="text-xl font-bold mb-2">Profil Masjid</h6>
            @if ($masjid->photo_profile)
            <div class="mt-4">
                <img src="{{ $masjid->photo_profile->url }}" alt="Gambar Masjid" class="rounded-lg w-full">
            </div>
        @else
            <div class="mt-1 h-1/2">
                <img src="https://source.unsplash.com/featured/?mosque" alt="Gambar Masjid" class="rounded-lg w-full h-full">
            </div>
    @endif
            <div class="space-y-2">
                <p class=" text-md"><span class="font-semibold">Nama Masjid:</span> {{ $masjid->name }}</p>
                <p class=" text-md"><span class="font-semibold">Jumlah Ustadz:</span> {{ $jmlUstadz }}</p>
                <p class=" text-md"><span class="font-semibold">Jumlah Santri:</span> {{ $jmlSantri }}</p>
            </div>
        </div>        
    </div>
    <div>
        <livewire:masjid-show :id="$masjid->id" />
    </div>
</div>
@endsection