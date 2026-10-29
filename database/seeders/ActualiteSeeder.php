<?php

namespace Database\Seeders;

use App\Models\Actualite;
use App\Models\User;
use Illuminate\Database\Seeder;

class ActualiteSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@pharmausta.bj')->first();

        if (!$admin) {
            $this->command->warn('Admin principal introuvable. Lancez AdminPrincipalSeeder avant ActualiteSeeder.');
            return;
        }

        $actualites = [
            [
                'titre' => 'Ouverture de la plateforme PharmaUSTA',
                'contenu' => "Chers étudiants,\n\nNous avons le plaisir de vous annoncer l'ouverture officielle de la plateforme PharmaUSTA, dédiée à la mise à disposition des ressources pédagogiques de la faculté de Pharmacie de l'USTA.\n\nVous y trouverez des cours, des anciens sujets d'examens, des exposés et divers documents complémentaires, classés par niveau, UE et ECUE.\n\nBonne exploration à toutes et à tous !",
                'type' => 'annonce',
                'statut' => 'publie',
                'date_publication' => now()->subDays(10)->toDateString(),
            ],
            [
                'titre' => 'Communiqué : calendrier des examens du semestre 1',
                'contenu' => "Le calendrier officiel des examens du semestre 1 est désormais disponible.\n\nLes épreuves se dérouleront du 15 au 30 janvier. Les étudiants sont invités à consulter régulièrement la plateforme pour toute mise à jour.\n\nNous rappelons que la présence à toutes les épreuves est obligatoire et que toute fraude sera sévèrement sanctionnée conformément au règlement en vigueur.",
                'type' => 'communique',
                'statut' => 'publie',
                'date_publication' => now()->subDays(5)->toDateString(),
            ],
            [
                'titre' => 'Séminaire sur la pharmacovigilance',
                'contenu' => "Un séminaire sur la pharmacovigilance et le bon usage du médicament sera organisé le samedi 25 novembre à l'amphithéâtre principal.\n\nAu programme :\n- Introduction à la pharmacovigilance\n- Cas pratiques et retours d'expérience\n- Table ronde avec des professionnels du secteur\n\nInscription obligatoire auprès du bureau des étudiants.",
                'type' => 'evenement',
                'statut' => 'publie',
                'date_publication' => now()->subDays(2)->toDateString(),
            ],
            [
                'titre' => 'Mise à jour de la bibliothèque numérique',
                'contenu' => "Plus de 50 nouvelles ressources ont été ajoutées à la bibliothèque numérique, couvrant notamment les UE de pharmacologie, toxicologie et pharmacie clinique.\n\nNous remercions chaleureusement les enseignants et les étudiants qui ont contribué à cet enrichissement.",
                'type' => 'annonce',
                'statut' => 'publie',
                'date_publication' => now()->subDay()->toDateString(),
            ],
            [
                'titre' => 'Journée portes ouvertes CEPHARM',
                'contenu' => "Le Club des Étudiants en Pharmacie (CEPHARM) organise une journée portes ouvertes le vendredi 8 décembre.\n\nCet événement vise à présenter les différentes filières et débouchés de la pharmacie aux nouveaux bacheliers et à leurs parents.\n\nVenez nombreux !",
                'type' => 'evenement',
                'statut' => 'publie',
                'date_publication' => now()->toDateString(),
            ],
            [
                'titre' => 'Brouillon : nouveau règlement intérieur',
                'contenu' => "Projet de révision du règlement intérieur de la faculté. Ce document est en cours de relecture avant publication officielle.",
                'type' => 'communique',
                'statut' => 'brouillon',
                'date_publication' => null,
            ],
            [
                'titre' => 'Ancienne annonce retirée',
                'contenu' => "Cette annonce a été retirée car les informations qu'elle contenait ne sont plus à jour.",
                'type' => 'annonce',
                'statut' => 'retire',
                'date_publication' => now()->subMonths(2)->toDateString(),
            ],
        ];

        foreach ($actualites as $data) {
            Actualite::firstOrCreate(
                ['titre' => $data['titre']],
                array_merge($data, ['auteur_id' => $admin->id])
            );
        }
    }
}
