<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::created([
//            'name'=>'Herick Guimaraes',
//            'email'=>'herick@hotmail.com',
//            'passworld'=>bcrypt('123456'),
//            ]);

        $data = [
            'name'=>'Herick Guimaraes',
            'email'=>'herick@hotmail.com',
            'password'=>bcrypt('123456')
        ];

        $user = new User();
        $user->fill($data);
        $user->save();
        dd($user);

    }
}
