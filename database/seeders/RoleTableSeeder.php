<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = Role::create([
            'name'=>'super_admin',
            'display_name'=>'Super Admin',
            'description'=>'Can See Every Thing'
        ]);

        $user = Role::create([
            'name'=>"user",
            'display_name'=>"User",
            'description'=>"Do any thing",
        ]);
    }
}
