<?php

namespace Database\Seeders;

use App\Models\Career;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $careers = [
            [
                'title' => 'Licensed Chemical Engineering',
                'content' => 'SEND YOUR RESUME at gec@galerioenvi.com',
                'published_date' => Carbon::now()
            ], [
                'title' => 'Licensed Chemical Engineering',
                'content' => 'SEND YOUR RESUME at gec@galerioenvi.com',
                'published_date' => Carbon::now()
            ],
        ];

        foreach ($careers as $career) {
            Career::updateOrCreate([
                'title' => $career['title'],
                'content' => $career['content'],
                'published_date' => $career['published_date'],
            ]);
        }
    }
}
