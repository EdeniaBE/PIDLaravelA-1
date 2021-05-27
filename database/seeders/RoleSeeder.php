<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $roles = [

            ['role'=>"admin"],
            ['role'=>"member"],
            ['role'=>"affiliate"]
        ];

        DB::table('roles')->insert($roles);
    }
}
