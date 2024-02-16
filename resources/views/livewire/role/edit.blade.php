<div>
    <div class="card card-side bg-base-100 shadow-xl col-span-2">
        <div class="card-body">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-100  shadow-md">
                <h1 class="text-xl font-bold">Edit Role</h1>
            </div>
                <form>
                <!-- Nama Role -->
                <div>
                    <label class="form-control">
                        <span class="label-text">Nama Role</span>
                        <input type="text" wire:model.defer="nameId" placeholder="Masukkan nama role"
                            class="input input-bordered input-accent @error('role.name') border-red-500 @enderror"
                            autofocus />
                        @error('role.name') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>

                <!-- Permission -->
                <div>
                    <label class="form-control">
                        <span class="label-text">Permission</span>
                        <!-- Daftar permission di sini -->
                        <div class="flex flex-col space-y-2">
                            @foreach($permissions as $permission)
                            <label class="inline-flex items-center">
                                <input type="checkbox" wire:model.defer="selectedPermissions" value="{{ $permission->name }}" class="form-checkbox">
                                <span class="ml-2">{{ $permission->name }}</span>
                            </label>
                            @endforeach
                        </div>
                        @error('selectedPermissions') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col gap-y-3 mt-2">
                    <button wire:click.prevent="edit()" class="btn btn-primary w-[98%]">Submit</button>
                    <button wire:click.prevent="cancel()" class="btn btn-secondary w-[98%]">Cancel</button>
                </div>
            </form>
            </div>
        </div>
</div>
@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('refreshSearch', function () {
            Livewire.emit('refreshSearch');
        });
        Livewire.emit('refreshMode');
    });
</script>
@endpush