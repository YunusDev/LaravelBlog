<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisionsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            'name' => 'CreateUsers',
            'for' => 'user',
            'guard_name' => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'EditUsers',
            'for' => 'user',
            'guard_name' => 'admin',

        ]);
        DB::table('permissions')->insert([
            'name' => 'DeleteUsers',
            'for' => 'user',
            'guard_name' => 'admin',

        ]);
        DB::table('permissions')->insert([
            'name' => 'RoleCRUD',
            'for' => 'other',
            'guard_name' => 'admin',

        ]);
        DB::table('permissions')->insert([
            'name' => 'PermissionCRUD',
            'for' => 'other',
            'guard_name' => 'admin',

        ]);
    }
}
