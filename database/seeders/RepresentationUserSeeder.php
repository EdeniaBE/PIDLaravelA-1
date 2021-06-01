<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Show;
use App\Models\User;
use App\Models\Representation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RepresentationsTableSeeder extends Seeder
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
        Representation::truncate();
        Schema::enableForeignKeyConstraints();

        //Define data
        $representations = [
            [
                'location_slug'=>'espace-delvaux-la-venerie',
                'show_slug'=>'ayiti',
                'when'=>'2012-10-12 13:30',
            ],
            [
                'location_slug'=>'dexia-art-center',
                'show_slug'=>'ayiti',
                'when'=>'2012-10-12 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=>'cible-mouvante',
                'when'=>'2012-10-02 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=>'ceci-nest-pas-un-chanteur-belge',
                'when'=>'2012-10-16 20:30',
            ],
        ];

        //Prepare the data
        foreach ($representationUsers as &$data){
            //search the user for a given username
            $user = User::where([
                ['login','=',$data['user_login']]
            ])->first();

            $location = Location::where([
                ['slug','=',$data['location_slug']]
            ])->first();

            $show = Show::where([
                ['slug','=',$data['show_slug']]
            ])->first();

            $representation = Representation::where([
                ['location_id','=',$location->id],
                ['show_id','=',$show->id],
                ['when','=',$data['representation_when']]
            ])->first();

            unset($data['user_login']);
            unset($data['location_slug']);
            unset($data['show_slug']);
            unset($data['representation_when']);

            $data['user_id'] = $user->id;

            $data['representation_id'] = $representation->id;

        }
        unset($data);

        DB::table('representation_user')->insert($representationUsers);

    }
}
