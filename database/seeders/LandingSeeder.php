<?php

namespace Database\Seeders;

use App\Models\Landing;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        Landing::updateOrCreate([
            'header_text' => 'Partner in Development',
            'video_url' => 'https://www.youtube.com/embed/wnhvanMdx4s'
        ]);
    }
}
