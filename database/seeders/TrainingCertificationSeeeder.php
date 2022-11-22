<?php

namespace Database\Seeders;

use App\Models\Training;
use App\Models\TrainingCertification;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TrainingCertificationSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        TrainingCertification::updateOrCreate([
            'training_id' => Training::all()->random()->id,
            'name' => $this->faker->name(),
        ]);
    }
}
