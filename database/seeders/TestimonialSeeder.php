<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Marie Dupont',
            'role' => 'Directrice',
            'organization' => 'ONG Espoir',
            'content' => 'Travailler avec la Fondation Halya a été une expérience transformative. Leur engagement et leur professionnalisme sont exemplaires.',
            'is_active' => true,
            'order' => 1,
        ]);
        Testimonial::create([
            'name' => 'Jean-Pierre Martin',
            'role' => 'Bénéficiaire',
            'organization' => 'Programme Éducation',
            'content' => 'Grâce à la Fondation Halya, mes enfants ont pu retourner à l\'école. Cela a changé notre vie entière. Je suis infiniment reconnaissant.',
            'is_active' => true,
            'order' => 2,
        ]);
        Testimonial::create([
            'name' => 'Sophie Bernard',
            'role' => 'Volontaire',
            'organization' => 'Équipe Santé',
            'content' => 'Être volontaire pour la Fondation Halya est l\'une des expériences les plus enrichissantes de ma vie. L\'impact est réel et mesurable.',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
