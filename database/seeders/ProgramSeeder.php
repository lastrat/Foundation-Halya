<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        Program::query()->delete();

        Program::create([
            'title' => 'Soutien aux orphelins',
            'description' => 'Offrir un accompagnement holistique aux orphelins : hébergement, éducation, soins et soutien psychologique pour leur assurer un avenir digne et prometteur.',
            'content' => 'Notre programme Soutien aux Orphelins vise à répondre aux besoins fondamentaux des enfants privés de leurs parents. Nous proposons des foyers d\'accueil sécurisés, un accès à l\'éducation, des soins de santé et un suivi psychologique personnalisé. Grâce à nos partenaires et nos équipes dévouées, chaque enfant bénéficie d\'un environnement stable et aimant pour grandir et se développer sereinement.',
            'icon' => 'fas fa-heart',
            'slug' => 'soutien-aux-orphelins',
            'is_active' => true,
            'order' => 1,
        ]);
        Program::create([
            'title' => 'Éducation des jeunes',
            'description' => 'Donner à chaque jeune les moyens de réussir par l\'éducation, la formation professionnelle et l\'accompagnement personnalisé vers l\'autonomie.',
            'content' => 'Le programme Éducation des Jeunes s\'articule autour de plusieurs axes : scolarisation des enfants défavorisés, bourses d\'études pour les méritants, formation professionnelle pour les jeunes sans emploi et mise en place de centres d\'alphabétisation. Nous croyons que l\'éducation est le levier le plus puissant pour briser le cycle de la pauvreté et construire un avenir meilleur.',
            'icon' => 'fas fa-graduation-cap',
            'slug' => 'education-des-jeunes',
            'is_active' => true,
            'order' => 2,
        ]);
        Program::create([
            'title' => 'Autonomisation économique de la femme',
            'description' => 'Permettre aux femmes d\'accéder à l\'indépendance financière grâce à la formation, le microcrédit et l\'accompagnement entrepreneurial.',
            'content' => 'Notre programme d\'Autonomisation Économique de la Femme propose des formations métiers, des microcrédits sans intérêt, des ateliers d\'entrepreneuriat et un accompagnement personnalisé pour aider les femmes à créer ou développer leur propre activité. En favorisant leur autonomie économique, nous renforçons leur pouvoir de décision et leur rôle au sein de la communauté.',
            'icon' => 'fas fa-hand-holding-heart',
            'slug' => 'autonomisation-economique-femme',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
