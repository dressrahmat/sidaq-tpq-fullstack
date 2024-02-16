<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Masjid;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => bcrypt(4444),
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $masjid = Masjid::create([
                'nama_masjid' => 'Masjid Ismuhu Yahya',
            ]);
            Role::create(['name' => 'superadmin']);
            Role::create(['name' => 'admin']);
            Role::create(['name' => 'ustadz']);
            Role::create(['name' => 'santri']);

            $pusat = User::create(array_merge([
                'name' => 'Pusat',
                'email' => 'pusat@gmail.com',
                'id_masjid' => $masjid->id,
            ], $default_user_value));

            $pusat->assignRole('superadmin');
            Profile::create([
                'id_user' => $pusat->id,
                'alamat' => 'Jalan Jalan',
                'kota' => 'Pontianak',
                'provinsi' => 'Kalimantan Barat',
                'tanggal_lahir' => Carbon::now(),
                'amanah' => 'Pusat Kaderisasi',
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
