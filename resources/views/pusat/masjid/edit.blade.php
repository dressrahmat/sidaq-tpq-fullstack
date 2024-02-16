@extends('main.app')
@section('content')
<div class="p-3">
    <div class="m-2">
        <a href="{{route('masjid.index')}}" class="btn btn-neutral btn-sm">Kembali</a>
    </div>
    <livewire:masjid.edit  :id="$id" />
</div>
@endsection