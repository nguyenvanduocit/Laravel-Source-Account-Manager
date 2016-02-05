<?php

use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servers')->insert([
            'name'=>'Hồ Chí Minh',
           'ip'=>'hcm.cs4vn.vn',
            'port' => 27015,
            'game_id'=>1,
            'status'=>1
        ]);
    }
}
