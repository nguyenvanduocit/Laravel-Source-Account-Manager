<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('roles')->insert([
            'name' => 'administrator',
            'display_name' => 'Administrator',
            'description' => 'System administrator',
        ]);
        //2
        DB::table('roles')->insert([
            'name' => 'account_manager',
            'display_name' => 'hr',
            'description' => 'humand',
        ]);
        //3
        DB::table('roles')->insert([
            'name' => 'game_manager',
            'display_name' => 'Game Operator',
            'description' => 'operator',
        ]);
        //4
        DB::table('roles')->insert([
            'name' => 'member',
            'display_name' => 'Game Operator',
            'description' => 'operator',
        ]);
        //5
        DB::table('roles')->insert([
            'name' => 'moderator',
            'display_name' => 'Game Operator',
            'description' => 'operator',
        ]);
        //6
        DB::table('roles')->insert([
            'name' => 'content_manager',
            'display_name' => 'Content manager',
            'description' => 'Content manager',
        ]);
    }
}
