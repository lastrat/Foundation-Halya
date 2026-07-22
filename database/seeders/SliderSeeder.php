<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        Slider::create([
            'title' => 'Agir ensemble pour un avenir durable',
            'description' => 'La Fondation Halya s\'engage pour un monde meilleur.',
            'image' => 'sliders/slider1.jpg',
            'link' => null,
            'is_active' => true,
            'order' => 1,
        ]);
        Slider::create([
            'title' => 'Nos Programmes d\'Action',
            'description' => 'Découvrez nos initiatives pour transformer les communautés.',
            'image' => 'sliders/slider2.jpg',
            'link' => route('programs.index'),
            'is_active' => true,
            'order' => 2,
        ]);
        Slider::create([
            'title' => 'Rejoignez Notre Mission',
            'description' => 'Ensemble, nous pouvons faire la différence.',
            'image' => 'sliders/slider3.jpg',
            'link' => route('contact'),
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
