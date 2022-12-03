<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name'=>'super_admin',
            'email'=>'super_admin@app.com',
            'password'=>Hash::make('123')
        ]);

        $user->attachRole('super_admin');

    }
}
