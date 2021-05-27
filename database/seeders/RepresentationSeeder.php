<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Show;
use App\Models\Location;
use App\Models\Representation;

class RepresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Representation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $representations = [
            [
                'location_slug'=>'Espace-Delvaux-La-Vènerie',
                'show_slug'=>'Ayiyi',
                'when'=>'2012-10-12 13:30',
            ],
            [
                'location_slug'=>'Dexia-Art-Center',
                'show_slug'=>'Ayiyi',
                'when'=>'2012-10-12 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=>'Cible-mouvante',
                'when'=>'2012-10-02 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=>'Ceci-nest-pas-un-chanteur-belge',
                'when'=>'2012-10-16 20:30',
            ],
        ];

        foreach($representations as &$data){
            $location = Location::firstWhere('slug', $data['location_slug']);
            unset($data['location_slug']);

            $show = Show::firstWhere('slug', $data['show_slug']);
            unset($data['show_slug']);

            $data['location_id'] = $location->id ?? null;
            $data['show_id'] = $show->id;
        }

        unset($data);

        DB::table('representations')->insert($representations);
    }
}
