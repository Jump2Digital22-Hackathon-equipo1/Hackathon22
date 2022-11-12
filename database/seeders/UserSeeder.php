<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = ([
            'name' => 'Admin',
            'email' => 'admin@admin.net',
            'password' => '123456',
        ]);
       $user = User::create([

            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']), // 123456
        ]);
        
        $user->assignRole(['admin']);

        $user->createToken('apptoken')->accessToken;


        $fields = ([
            'name' => 'User',
            'email' => 'user@admin.net',
            'password' => '123456',
        ]);
        
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']), // 123456
        ]);
        $user->createToken('apptoken')->accessToken;

        $user->assignRole(['user']);

    }
}
