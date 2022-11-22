<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        About::updateOrCreate([
            'content' => '<p><strong>Galerio Environmental Consultancy (GEC)</strong> is a registered engineering and environmental management company. It serves industries, property developers, and government units.</p>',
            'mission' => 'GEC is committed to helping the private and public sectors find that balance between technological advancement and preservation of the earth’s resources for the future generation. Specifically, it aims to help the government, industries and developers plan and subscribe to the same principles of responsible development. At the core of its values is the commitment to dedicatedly help the government, industries and developers plan how to manage their responsibilities towards the environment, and the people. To achieve this, GEC will help clients understand and comply with environmental legislation and craft plans to identify environmental, social and economic risks and formulate measures to mitigate these risks. GEC will dedicate itself to providing quality service to its clients with the highest level of professionalism and integrity.',
            'vision' => 'To be the ultimate engineering and environmental management consultancy provider for local government units, industries, and developers because of the company’s strong commitment, passion, and dedication to its mission and philosophy.'
        ]);
    }
}
