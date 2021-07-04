<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class bendaharaTableseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\kepsek::insert([
        //     'nama'=>'Rahmat Ilyas',
        //     'email'=>'kepsek@gmail.com',
        //     'password'=>Hash::make('qwerty123')
        // ]);
        // \App\bendahara::insert([
        //     [
        //         'nama'=>'Hj Sukma',
        //         'email'=>'bendahara@gmail.com',
        //         'password'=>Hash::make('qwerty123')
        //     ]
        // ]);
         \App\sekolah::insert([
            [
                'nama'=>'SD NEGERI NO 112 SATTULU',
                'alamat'=>'Sattulu, Kecamatan Sinjai Tengah Kabupaten Sinjai',
                'no_hp'=>'081342837232',
                'email'=>'sdnsattulu@gmail.com'
            ]
        ]);
    }
}
