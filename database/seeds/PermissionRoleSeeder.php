<?php

use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //administrator
        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '1',
        ]);

        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '2',
        ]);
        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '3',
        ]);
        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '4',
        ]);
        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '5',
        ]);
        //account manager
        DB::table('permission_role')->insert([
            'role_id' => '2',
            'permission_id' => '4',
        ]);
        //game manager
        DB::table('permission_role')->insert([
            'role_id' => '3',
            'permission_id' => '5',
        ]);
        //content manager
        DB::table('permission_role')->insert([
            'role_id' => '6',
            'permission_id' => '6',
        ]);
    }
}
