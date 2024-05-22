<?php

namespace Database\Seeders;

use App\Models\ModelUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (!DB::table('users')->where('email', 'admin@gmail.com')->exists()) {

            $user = new ModelUsers();
            $user->name = "Admin";
            $user->email = "admin@gmail.com";
            $user->phone = "030012345678";
            $user->password = Hash::make(123456);
            $user->status = 'active';
            $user->role = 'super_admin';
            $user->user_type = 1;
            $user->save();
        }

        if (!DB::table('users')->where('email', 'test@gmail.com')->exists()) {

            $user = new ModelUsers();
            $user->name = "Test User";
            $user->email = "test@gmail.com";
            $user->phone = "030013447788";
            $user->password = Hash::make(123456);
            $user->status = 'active';
            $user->role = 'user';
            $user->user_type = 2;
            $user->save();
        }


    }
}
