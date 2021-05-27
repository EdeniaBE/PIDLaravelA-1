<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([ArtistSeeder::class,
                    LocalitySeeder::class,
                    TypeSeeder::class,
                    RoleSeeder::class,
                    LocationSeeder::class,
                    ShowSeeder::class,
                    RepresentationSeeder::class,
                    ArtistTypeSeeder::class,
                    ArtistTypeShowSeeder::class,
                    ]);
    }
}
