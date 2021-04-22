<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Location;
use App\Models\Locality;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::truncate();

        $locations = [
            [
                'slug' => null,
                'designation' => 'Espace Delvaux / La vénerie',
                'address' => '3 rue Gratès',
                'locality_postal_code' => '1170',
                'website' => 'https://www.lavenerie.be',
                'phone' => '+32 (0)2/663.85.50',
            ],
            [
                'slug' => null,
                'designation' => 'Dexia art center',
                'address' => '50 rue de l\'Ecuyer',
                'locality_postal_code' => '1000',
                'website' => null,
                'phone' => null,
            ],
            [
                'slug' => null,
                'designation' => 'La Samaritaine',
                'address' => '16 rue de la samaritaine',
                'locality_postal_code' => '1000',
                'website' => 'https://www.lasamaritaine.be/',
                'phone' => null,
            ],
            [
                'slug' => null,
                'designation' => 'Espace Magh',
                'address' => '17 rue du poinçon',
                'locality_postal_code' => '1000',
                'website' => 'https://www.espacemagh.be',
                'phone' => '+32 (0)2/274.05.10',
            ],
        ];

        foreach($locations as &$data) {
            $locality = Locality::firstWhere('postal_code',$data['locality_postal_code']);
            unset($data['locality_postal_code']);

            $data['slug'] = Str::slug($data['designation'],'-');
            $data['locality_id'] = $locality->id;
        }

        DB::table('locations')->insert($locations);
    }
}
