<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'name' => 'Adebayo',
            'email' => 'ade@gmail.com',
            'phone' => '0902133',
            'password' => bcrypt('ade123'),
        ]);

    }
}
