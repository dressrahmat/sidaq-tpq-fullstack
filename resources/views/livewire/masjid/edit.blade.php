<div>
    <form wire:submit.prevent="update" enctype="multipart/form-data" class="grid grid-cols-2 gap-4">
        <div class="card card-side bg-base-100 shadow-xl">
            <div class="card-body">
                <!-- Nama Masjid -->
                <div>
                    <label class="form-control">
                        <span class="label-text">Nama Masjid</span>
                        <input type="text" wire:model.defer="namaMasjid" placeholder="Masukkan nama masjid"
                            class="input input-bordered input-accent @error('namaMasjid') border-red-500 @enderror"
                            autofocus />
                        @error('namaMasjid') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>

                <!-- Email -->
                <div>
                    <label class="form-control">
                        <span class="label-text">Email {{$provinsi}}</span>
                        <input type="email" wire:model.defer="email" placeholder="Masukkan alamat email"
                            class="input input-bordered input-accent @error('email') border-red-500 @enderror" />
                        @error('email') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>

                <!-- Provinsi -->
                <div>
                    <label class="form-control">
                        <span class="label-text">Pilih Provinsi </span>
                        <select wire:model="provinsi" name="provinsi" id="provinsi"
                                class="select select-bordered select-accent @error('kodeProvinsi') border-red-500 @enderror"
                                wire:change="updateKabupaten($event.target.value)" wire:loading.attr="disabled"
                                wire:target="kodeProvinsi">
                            {{-- <option value="" selected>Pilih Provinsi</option> --}}
                            @foreach ($wilayahProvinsi as $nama => $kode)
                                <option value="{{ $kode }}"  @if ($provinsi == $nama) selected @endif>{{ $nama }}</option>
                            @endforeach
                        </select>
                        @error('kodeProvinsi') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>
                

                <!-- Kabupaten -->
                <div>
                    <label class="form-control">
                        <span class="label-text">Pilih Kabupaten</span>
                        <select wire:model="kabupaten" name="kabupaten" id="kabupaten"
                            class="select select-bordered select-accent @error('kab') border-red-500 @enderror">
                            <option value="" selected disabled>Pilih Kabupaten</option>
                            @foreach ($wilayahKabupaten as $nama => $kode)
                            <option value="{{ $kode }}">{{ $nama }}</option>
                            @endforeach
                        </select>
                        @error('kab') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>

                <!-- Alamat -->
                <div>
                    <label class="form-control">
                        <span class="label-text">Alamat</span>
                        <textarea wire:model.defer="alamat" placeholder="Masukkan alamat masjid"
                            class="textarea textarea-bordered textarea-accent @error('alamat') border-red-500 @enderror"></textarea>
                        @error('alamat') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>
            </div>
        </div>

        <div class="card card-side bg-base-100 shadow-xl">
            <div class="card-body">
                <!-- Upload Foto -->
                <div>
                    <label class="form-control">
                        <span class="label-text">Upload Foto</span>
                        <div>
                            <label for="foto" class="cursor-pointer flex items-center justify-center">
                                <img src="{{ asset('assets/images/input-photo.png') }}" alt=""
                                    class="p-5 m-5 bg-gray-100 shadow-lg w-1/3">
                            </label>
                            <input type="file" wire:model="foto" accept="image/*" class="file-input hidden">
                        </div>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-full text-lg">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
