<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        Partner::create([
            'name' => 'UNICEF',
            'website' => 'https://www.unicef.org',
            'description' => 'Partenaire stratégique pour les programmes éducatifs et de santé infantile.',
            'is_active' => true,
            'order' => 1,
        ]);
        Partner::create([
            'name' => 'Greenpeace',
            'website' => 'https://www.greenpeace.org',
            'description' => 'Collaboration pour les initiatives de développement durable et de protection de l\'environnement.',
            'is_active' => true,
            'order' => 2,
        ]);
        Partner::create([
            'name' => 'Croix-Rouge',
            'website' => 'https://www.croix-rouge.fr',
            'description' => 'Partenaire humanitaire pour les actions d\'urgence et de santé communautaire.',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
