<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Service;
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
        $this->call([
            AdminSeeder::class,
            LandingSeeder::class,
            ClientSeeder::class,
            AboutSeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            TrainingSeeder::class,
            TrainingCertificationSeeeder::class,
            TraineeSeeder::class,
            BlogSeeder::class,
            CareerSeeder::class,
            ContactUsSeeder::class,
            LandingFeaturedImageSeeder::class
        ]);
    }
}
