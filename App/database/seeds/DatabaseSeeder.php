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

        Sentinel::register([
            'email' => 'fake@gmail.com',
            'username' => 'fake',
            'password' => 'test'
        ], true);

        Model::reguard();
    }
}
