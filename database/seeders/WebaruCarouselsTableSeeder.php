<?php

namespace Database\Seeders;

use app\Models\WebaruCarousel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebaruCarouselsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       WebaruCarousel::create([
            'title' => 'First Carousel',
            'description' => 'This is the first carousel.',
            'image_url' => 'https://example.com/image1.jpg',
        ]);

        WebaruCarousel::create([
            'title' => 'Second Carousel',
            'description' => 'This is the second carousel.',
            'image_url' => 'https://example.com/image2.jpg',
        ]);
    }
}
