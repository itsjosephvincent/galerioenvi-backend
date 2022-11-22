<?php

namespace Database\Seeders;

use App\Models\LandingFeaturedImage;
use Illuminate\Database\Seeder;

class LandingFeaturedImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $featuredImages = [
            [
                'name' => 'GEC',
                'image_url' => 'https://galerioenvi.com/img/homepage/1.jpg',
            ],
            [
                'name' => 'Samal Bridge',
                'image_url' => 'https://galerioenvi.com/img/davaosamalconnector/Samal1.jpg',
            ],
            [
                'name' => 'Caraga',
                'image_url' => 'https://galerioenvi.com/img/homepage/caraga1.jpg',
            ],
        ];

        foreach ($featuredImages as $featuredImage) {
            LandingFeaturedImage::updateOrCreate([
                'name' => $featuredImage['name'],
                'image_url' => $featuredImage['image_url']
            ]);
        }
    }
}
