<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        ContactUs::updateOrCreate([
            'emails' => 'info@galerioenvi.com',
            'phones' => '(082) 224-3197 (GEC-IT Park)
+63 917 7180 832',
            'offices' => '(MAIN) Door no.1, Ground Floor, Matina IT Park Building 2, McArthur Highway, Matina, Davao City, Philippines, 8000

(Virtual Office) 121 Quezon Ave., Quezon City, 1114, Metro Manila'
        ]);
    }
}
