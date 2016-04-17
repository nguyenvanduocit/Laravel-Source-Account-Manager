<?php

use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'name' => 'Counter-Strike: Global Offensive',
            'download_url' => 'http://cs4vn.vn/',
            'video_id'=>'edYCtaNueQY',
            'description' => 'ounter-Strike: Global Offensive is an online first-person shooter developed by Hidden Path Entertainment and Valve Corporation. It is the fourth game in the main Counter-Strike franchise.'
        ]);
    }
}
