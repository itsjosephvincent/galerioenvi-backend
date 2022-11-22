<?php

namespace Database\Seeders;

use App\Models\Trainee;
use App\Models\TrainingCertification;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TraineeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        Trainee::updateOrCreate([
            'training_certification_id' => TrainingCertification::all()->random()->id,
            'name' => $this->faker->name(),
            'certificate_no' => $this->faker->randomNumber(),
            'training_date_from' => Carbon::now(),
            'training_date_to' => Carbon::now()
        ]);
    }
}
