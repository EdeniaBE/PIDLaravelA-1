<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Show;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Show::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $shows= [
            [
                'slug'=>null,
                'title'=>'Ayiyi',
                'description'=>"Un homme est bloqué à l'aéroport. \n"
                    . "Questionné par les douaniers, il doit alors justifier son identité, "
                    . "et surtout prouver qu'il est haïtien - qu'est-ce qu'être haïtien ?",
                'poster_url'=>'ayiti.jpg',
                'location_slug'=>'Espace-Delvaux-La-Vénerie',
                'bookable'=>true,
                'price'=>8.50,
            ],
            [
                'slug'=>null,
                'title'=>'Cible mouvante',
                'description'=>"Dans ce thriller d'anticipation, des adultent semblent alimenter \n"
                    . "et véhiculer une crainte féroce envers les enfats agés entre 10 et 12 ans.",
                'poster_url'=>'cible.jpg',
                'location_slug'=>'Dexia-Art-Center',
                'bookable'=>true,
                'price'=>9.00,
            ],
            [
                'slug'=>null,
                'title'=>'Ceci n\'est pas un chanteur belge',
                'description'=>"Non peut-être ?! \nEntre Magritte (pour le surréalisme comique) "
                    . "et Maigret (pour le réalisme mélancolique), ce dixième opus semaline propose "
                    . "quatorze nouvelles chansons mêlées à de petits textes humoristiques et "
                    . "à quelques fortes images poétiques.",
                'poster_url'=>'claudebelgesaison220.jpg',
                'location_slug'=>null,
                'bookable'=>false,
                'price'=>5.50,
            ],
            [
                'slug'=>null,
                'title'=>'Manneke... !',
                'description'=>"À tour de rôle, Pierre se jour de ses oncles, "
                    . "tantes, grand-parents, et surtout de sa mère.",
                'poster_url'=>'wayburn.jpg',
                'location_slug'=>'La-Samaritaine',
                'bookable'=>true,
                'price'=>10.50,
            ],
        ];

        foreach($shows as &$data){
            $location = Location::firstWhere('slug', $data['location_slug']);
            unset($data['location_slug']);

            $data['slug'] = Str::slug($data['title'],'-');
            $data['location_id'] = $location->id ?? null;
        }

        unset($data);

        DB::table('shows')->insert($shows);
    }
}
