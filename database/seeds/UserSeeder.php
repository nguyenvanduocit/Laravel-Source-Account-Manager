<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'administrator',
            'email' => 'phoenixsinh@gmail.com',
            'password' => bcrypt('password'),
            'facebook_id' => '10203986810668836'
        ]);
        DB::table('users')->insert([
            'name' => 'nhat',
            'email' => 'nhat@gmail.com',
            'password' => bcrypt('password'),
            'facebook_id' =>'728848415'
        ]);
    }
}
