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
        try {
            $data = [
                'name'=>'Herick Guimaraes',
                'email'=>'herick@hotmail.com',
                'password'=>bcrypt('123456')
            ];
            $user = new User();
            $user->fill($data);
            if(User::where('email', $data['email'])->count()) {
                echo "Este e-mail já está cadastrado: " . $data['email'] ." \n";
            } else {
                $user->save();
                echo "Usuãrio caddastrado" . "\n";
            }
        } catch (\Exception $e){
            echo 'Exceção: ', $e->getMessage(), "\n\n";
        }
    }
}
