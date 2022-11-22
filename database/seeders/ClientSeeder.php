<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        Client::updateOrCreate([
            'name' => $this->faker->name(),
            'logo_url' => $this->faker->url(),
            'description' => $this->faker->sentence(),
        ]);
    }
}
