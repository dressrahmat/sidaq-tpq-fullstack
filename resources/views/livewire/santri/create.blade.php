<div>
    <div class="card card-side bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-100  shadow-md">
                <h1 class="text-xl font-bold">Tambah User</h1>
            </div>
            <form>
                <!-- Nama -->
                <div>
                    <label class="form-control">
                        <span class="label-text py-2">Nama</span>
                        <input type="text" wire:model.defer="name" placeholder="Masukkan nama"
                            class="input input-bordered input-accent @error('name') border-red-500 @enderror"
                            autofocus />
                        @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>

                <!-- Email -->
                <div>
                    <label class="form-control">
                        <span class="label-text py-2">Email</span>
                        <input type="email" wire:model.defer="email" placeholder="Masukkan email"
                            class="input input-bordered input-accent @error('email') border-red-500 @enderror" />
                        @error('email') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>

                <!-- Password -->
                <div>
                    <label class="form-control">
                        <span class="label-text py-2">Password</span>
                        <input type="password" wire:model.defer="password" placeholder="Masukkan password"
                            class="input input-bordered input-accent @error('password') border-red-500 @enderror" />
                        @error('password') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>

                <!-- Role -->
                <div>
                    <label class="form-control">
                        <span class="label-text py-2">Role</span>
                        <select wire:model.defer="selectedRole" class="select select-bordered select-accent">
                            <option value="">Pilih Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedRole') <span class="error text-red-500">{{ $message }}</span> @enderror
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
