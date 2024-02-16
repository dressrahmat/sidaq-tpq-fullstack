<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Masjid;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasjidSeeder extends Seeder
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
            
            $masjid1 = Masjid::create([
                'nama_masjid' => 'Masjid Pemuda Peradaban',
            ]);

            $masjid2 = Masjid::create([
                'nama_masjid' => 'Masjid Generasi Robbani',
            ]);

            $masjid3 = Masjid::create([
                'nama_masjid' => 'Masjid Jalan Langit',
            ]);

            $masjid4 = Masjid::create([
                'nama_masjid' => 'Masjid Sejuta Pemuda',
            ]);

            $masjid5 = Masjid::create([
                'nama_masjid' => 'Masjid Ar Rahman',
            ]);

            $mpp = User::create(array_merge([
                'name' => 'Masjid Pemuda Peradaban',
                'email' => 'mpp@gmail.com',
                'id_masjid' => $masjid1->id,
            ], $default_user_value));

            $mager = User::create(array_merge([
                'name' => 'Masjid Generasi Robbani',
                'email' => 'mager@gmail.com',
                'id_masjid' => $masjid2->id,
            ], $default_user_value));

            $mjl = User::create(array_merge([
                'name' => 'Masjid Jalan Langit',
                'email' => 'mjl@gmail.com',
                'id_masjid' => $masjid3->id,
            ], $default_user_value));

            $msp = User::create(array_merge([
                'name' => 'Masjid Sejuta Pemuda',
                'email' => 'msp@gmail.com',
                'id_masjid' => $masjid4->id,
            ], $default_user_value));

            $mar = User::create(array_merge([
                'name' => 'Masjid Ar Rahman',
                'email' => 'mar@gmail.com',
                'id_masjid' => $masjid5->id,
            ], $default_user_value));

            $mpp->assignRole('admin');
            $mager->assignRole('admin');
            $mjl->assignRole('admin');
            $msp->assignRole('admin');
            $mar->assignRole('admin');

            Profile::create([
                'id_user' => $mpp->id,
                'alamat' => 'Jl. Kretek No. 7',
                'kota' => 'Bantul',
                'provinsi' => 'D.I Yogyakarta',
                'tanggal_lahir' => Carbon::now(),
                'amanah' => 'Masjid Kaderisasi',
            ]);

            Profile::create([
                'id_user' => $mager->id,
                'alamat' => 'Jl. Tamanan No. 5',
                'kota' => 'Bantul',
                'provinsi' => 'D.I Yogyakarta',
                'tanggal_lahir' => Carbon::now(),
                'amanah' => 'Masjid Kaderisasi',
            ]);

            Profile::create([
                'id_user' => $mjl->id,
                'alamat' => 'Jl. Langit No. 9',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'tanggal_lahir' => Carbon::now(),
                'amanah' => 'Masjid Kaderisasi',
            ]);

            Profile::create([
                'id_user' => $msp->id,
                'alamat' => 'Jl. Pemuda No. 94',
                'kota' => 'Bogor',
                'provinsi' => 'Jawa Barat',
                'tanggal_lahir' => Carbon::now(),
                'amanah' => 'Masjid Kaderisasi',
            ]);

            Profile::create([
                'id_user' => $mar->id,
                'alamat' => 'Jl. Cenderawasih No. 12',
                'kota' => 'Malang',
                'provinsi' => 'Jawa Timur',
                'tanggal_lahir' => Carbon::now(),
                'amanah' => 'Masjid Kaderisasi',
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
