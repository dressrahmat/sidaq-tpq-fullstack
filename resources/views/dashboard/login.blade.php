@extends('dashboard.layouts.auth')
@section('content')
<div class="card-body py-2">
    <div>
        <h2 class="text-3xl font-bold text-slate-700 mb-2">Assalamualaikum!</h2>
        <p class="text-base-content">Selamat Datang Kembali</p>
    </div>
    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Email -->
        <div>
            <label class="form-control w-full max-w-lg">
                <div class="label">
                    <span class="label-text">Email</span>
                </div>
                <input type="email" name="email" id="email" placeholder="Masukkan alamat email"
                    class="input input-bordered w-full max-w-lg" required />
            </label>
        </div>
                        
        <!-- Password -->
        <div>
            <label class="form-control w-full max-w-lg">
                <div class="label">
                    <span class="label-text">Password</span>
                </div>
                <input type="password" name="password" id="password" placeholder="Masukkan password"
                    class="input input-bordered w-full max-w-lg" required />
            </label>
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit" class="btn btn-primary w-full text-lg">Masuk</button>
            <p class="text-center">Belum Memiliki Akun Masjid ? <a href="{{route('register')}}" class=" text-primary">Daftar</a></p>
        </div>
    </form>
</div>
@endsection