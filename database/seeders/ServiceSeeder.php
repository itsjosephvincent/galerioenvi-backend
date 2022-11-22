<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'icon_url' => 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png',
                'title' => 'Engineering',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
            ],
            [
                'icon_url' => 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png',
                'title' => 'Geological',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
            ],
            [
                'icon_url' => 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png',
                'title' => 'Geotechnical',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
            ],
            [
                'icon_url' => 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png',
                'title' => 'Environmental',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
            ],
            [
                'icon_url' => 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png',
                'title' => 'Social',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
            ]
        ];

        foreach ($services as $service) {
            Service::updateOrCreate([
                'icon_url' => $service['icon_url'],
                'title' => $service['title'],
                'description' => $service['description'],
                'content' => $service['content']
            ]);
        }
    }
}
