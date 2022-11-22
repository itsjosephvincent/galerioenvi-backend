<?php

namespace Database\Seeders;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        Project::updateOrCreate([
            'thumbnail_url' => $this->faker->url(),
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'location' => $this->faker->country(),
            'published_date' => Carbon::now(),
            'content' => $this->faker->paragraph()
        ]);
    }
}
