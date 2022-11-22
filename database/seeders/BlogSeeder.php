<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        Blog::updateOrCreate([
            'thumbnail_url' => $this->faker->url(),
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'content' => $this->faker->paragraph()
        ]);
    }
}
