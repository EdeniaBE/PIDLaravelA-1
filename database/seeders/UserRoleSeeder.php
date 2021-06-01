<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('role_user')->truncate();
        Schema::enableForeignKeyConstraints();

        $roleUsers = [
            [
                'user_login'=>'Admin',
                'role'=>'admin',
            ],
            [
                'user_login'=>'AG',
                'role'=>'member',
            ],
            [
                'user_login'=>'AG',
                'role'=>'affiliate',
            ]
        ];

         //prepare the data
         foreach ($userRoles as &$data) {
            //search the user for a given username
            $user = User::where([
                ['login','=',$data['user_login']]
                ])->first();

            //search the role for a given role
            $role = Role::firstWhere('role',$data['role']);

            unset($data['user_login']);
            unset($data['role']);

            $data['user_id'] = $user -> id;
            $data['role_id'] = $role -> id;

        }
        unset($data);
        //insert data in tables
        DB::table('user_role')->insert($userRoles);

    }
}
