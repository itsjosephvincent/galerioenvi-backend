<?php

namespace Database\Seeders;

use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        Training::updateOrCreate([
            'thumbnail_url' => $this->faker->url(),
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'date_from' => Carbon::now(),
            'date_to' => Carbon::now(),
            'location' => $this->faker->country()
        ]);
    }
}
