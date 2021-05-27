<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Locality::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        //Define data
        $localities = [
            ['postal_code'=>'1000','locality'=>'Bruxelles'],
            ['postal_code'=>'1030','locality'=>'Schaerbeek'],
            ['postal_code'=>'1190','locality'=>'Forest'],
            ['postal_code'=>'1050','locality'=>'Ixelles'],
            ['postal_code'=>'1060','locality'=>'Saint-Gilles'],
            ['postal_code'=>'1180','locality'=>'Uccle'],
        ];
        
        //Insert data in the table
        DB::table('localities')->insert($localities);
    }
}
