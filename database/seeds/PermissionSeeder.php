<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('permissions')->insert([
            'name' => 'manage_user',
            'display_name' => 'Edit user',
            'description' => 'can edit user',
        ]);
        //2
        DB::table('permissions')->insert([
            'name' => 'manage_option',
            'display_name' => 'Manage options',
            'description' => 'can manage options',
        ]);
        //3
        DB::table('permissions')->insert([
            'name' => 'manage_role',
            'display_name' => 'Manage role',
            'description' => 'can manage role',
        ]);
        //4
        DB::table('permissions')->insert([
            'name' => 'manage_account',
            'display_name' => 'Manage account',
            'description' => 'can manage account',
        ]);
        //5
        DB::table('permissions')->insert([
            'name' => 'manage_game',
            'display_name' => 'Manage game',
            'description' => 'can manage game',
        ]);
    }
}
