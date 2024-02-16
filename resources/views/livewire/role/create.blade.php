<div>
    <div class="card card-side bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-100  shadow-md">
                <h1 class="text-xl font-bold">Tambah Role</h1>
            </div>
            <form>
            <!-- Nama Role -->
                <div>
                    <label class="form-control">
                        <span class="label-text py-2">Nama Role</span>
                        <input type="text" wire:model.defer="name" placeholder="Masukkan nama role"
                            class="input input-bordered input-accent @error('name') border-red-500 @enderror"
                            autofocus />
                        @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>

                <!-- Permission -->
                <div>
                    <label class="form-control">
                        <span class="label-text py-2">Permission</span>
                        <!-- Daftar permission di sini -->
                        <div class="flex flex-col space-y-2">
                            @foreach($permissions as $permission)
                            <label class="inline-flex items-center">
                                <input type="checkbox" wire:model.defer="selectedPermissions"
                                    value="{{ $permission->name }}" class="form-checkbox">
                                <span class="ml-2">{{ $permission->name }}</span>
                            </label>
                            @endforeach
                        </div>
                        @error('selectedPermissions') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col gap-y-3 mt-2">
                    <button wire:click.prevent="store()" class="btn btn-primary w-[98%]">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
