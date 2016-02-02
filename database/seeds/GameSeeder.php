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
            'download_url' => 'http://fucking.com',
            'video_id'=>'edYCtaNueQY',
            'description' => 'Free for every one'
        ]);
        DB::table('games')->insert([
            'name' => 'CSGO Casual',
            'download_url' => 'http://fucking.com',
            'video_id'=>'Wt2rGmUmm2A',
            'description' => 'Free for every one'
        ]);
    }
}
