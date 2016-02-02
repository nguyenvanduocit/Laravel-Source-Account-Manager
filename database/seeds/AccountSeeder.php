<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'username' => 'account1',
            'password' => 'password',
            'user_id' => '1',
            'game_id' => '1'
        ]);
        DB::table('accounts')->insert([
            'username' => 'account1',
            'password' => 'password',
            'user_id' => '1',
            'game_id' => '2'
        ]);
        DB::table('accounts')->insert([
            'username' => 'account2',
            'password' => 'password',
            'user_id' => '2',
            'game_id' => '1'
        ]);
    }
}
