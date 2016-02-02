<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();

        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PermissionRoleSeeder::class);

        $this->call(RoleUserSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(ServerSeeder::class);

        Model::reguard();
    }
}
