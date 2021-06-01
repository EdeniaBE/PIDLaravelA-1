<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        //Define data
        $users = [

            [
                'login'=>'Admin',
                'password'=> Hash::make(123456789),
                'firstname'=>'AdminFirstname',
                'lastname'=>'AdminLastname',
                'name'=>'AdminName',
                'email'=>'admin@admin.be',
                'langue'=>'Français',
            ],
            [
                'login'=>'AG',
                'password'=> Hash::make(123456789),
                'firstname'=>'Anne-Gaelle',
                'lastname'=>'Julien', 
                'name'=>'AnneGaelleJulien',
                'email'=>'ag-julien@outlook.com',
                'langue'=>'français',
            ]
        ];

        //Insert data in the table

        DB::table('users')->insert($users);
        /* foreach ($users as $data) {     
            DB::table('users')->insert([
                'login' => $data['login'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],   
                'langue' => $data['langue'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'email_verified_at' => $data['email_verified_at'],
            ]);
        } */
    }
}