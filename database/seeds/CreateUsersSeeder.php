<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=> bcrypt('admin123')
            ]
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
