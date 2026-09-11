<?php

namespace Database\Seeders;

use App\Models\Ecue;
use App\Models\Niveau;
use App\Models\Ue;
use Illuminate\Database\Seeder;

class UeEcueSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'L1 Pharmacie' => [
                'Anatomie 1' => ['Anatomie générale'],
                'Anatomie 2' => ['Appareil locomoteur', 'Tête et cou'],
                'Biologie cellulaire – Génétique' => ['Biologie cellulaire', 'Génétique'],
                'Mathématiques – Statistiques' => ['Mathématiques appliquées', 'Biostatistiques'],
                'Anglais' => ['Anglais médical'],
                'Méthodologie du travail' => ['Méthodologie du travail universitaire'],
                'Ethique et déontologie' => ['Ethique', 'Déontologie'],
                'Physiologie 1' => ['Physiologie générale'],
                'Histologie – Embryologie 1' => ['Histologie générale', 'Embryologie générale'],
                'Physique – Biophysique 1' => ['Physique', 'Biophysique 1'],
                'Droit et santé' => ['Droit et santé'],
                'Informatique' => ['Informatique médicale 1'],
                'Chimie 1' => ['Chimie Générale'],
                'Biochimie 1' => ['Biochimie structurale'],
            ],
            'L2 Pharmacie' => [
                'Chimie organique et Chimie minérale' => ['Chimie organique 1', 'Chimie minérale 1'],
                'Anatomie 3' => ['Anatomie d\'organes'],
                'Physiologie 2' => ['Physiologie d\'organes'],
                'Botanique – Cryptogamie' => ['Botanique 1', 'Cryptogamie 1'],
                'Initiation sur le médicament' => [
                    'ICM : Initiation à la Connaissance du Médicament',
                    'IDM : Initiation à la Délivrance du Médicament',
                    'IAM : Initiation à l\'Action du Médicament',
                ],
                'Biochimie 2 – Biologie Moléculaire' => ['Biochimie métabolique', 'Biologie Moléculaire', 'Enzymologie générale'],
                'Sciences humaines et sociales' => ['Psychologie médicale', 'Socio-anthropologie'],
                'Communication' => ['Anglais médical'],
                'Chimie analytique 1-2' => ['Chimie analytique 1 (quantitatif)', 'Chimie analytique 2 (qualitatif)'],
                'Physiologie végétale – Botanique 2' => ['Physiologie végétale', 'Botanique 2'],
                'Zoologie' => ['Zoologie générale'],
                'Pharmacie galénique 1' => ['Biopharmacie', 'Formes galéniques solides'],
                'Biophysique – Physico-Chimie' => ['Biophysique 2', 'Physico-Chimie'],
                'Technologie et communication' => ['Informatique 2', 'Anglais médical'],
                'Stage 1' => ['Stage d\'initiation officinal 1'],
            ],
            'L3 Pharmacie' => [
                'Parasitologie – Mycologie générale' => ['Parasitologie générale', 'Mycologie générale'],
                'Immunologie 1' => ['Immunologie générale'],
                'Biochimie 3 – Méthodes d\'analyses appliquées' => ['Méthodes chromatographiques et électrophorétiques', 'Méthodes spectrophotométriques'],
                'Hydrologie' => ['Hydrologie'],
                'Chimie thérapeutique 1' => ['Conception moléculaire des médicaments'],
                'Pharmacie galénique 2' => ['Pharmacie galénique'],
                'Pharmacologie générale et moléculaire' => ['Pharmacologie générale', 'Pharmacologie moléculaire'],
                'Soins infirmiers – Prévention des infections' => ['Soins infirmiers'],
                'Stage 2' => ['Stage soins infirmiers'],
                'Bactériologie – Virologie 1' => ['Bactériologie générale', 'Virologie Générale'],
                'Hématologie 1' => ['Hématologie générale'],
                'Chimie thérapeutique 2' => ['Synthèse et relation – structure - activité'],
                'Pharmacognosie 1' => ['Pharmacognosie générale'],
                'Chimie analytique 3 – Bromatologie' => ['Chimie analytique 3', 'Bromatologie'],
                'Conseil et soins pharmaceutiques' => ['Sémiologie médicale', 'Santé communautaire (Santé publique 1)'],
                'Stage 3' => ['Grossiste pharmaceutique'],
            ],
            'M1 Pharmacie' => [
                'Pharmacologie 2' => ['Pharmacologie appliquée'],
                'Toxicologie générale' => ['Toxicologie générale'],
                'Biochimie clinique 1' => ['Explorations biochimiques'],
                'Parasitologie – Mycologie appliquée' => ['Parasitologie médicale', 'Mycologie médicale'],
                'Pathologies médicales et chirurgicales' => ['Maladies infectieuses', 'Maladies non transmissibles', 'Pathologies chirurgicales'],
                'Règlementation et politique pharmaceutique' => ['Droit pharmaceutique', 'Ethique', 'Politique pharmaceutique', 'Pharmaco-économie'],
                'Communication' => ['Anglais médical'],
                'Stage 4' => ['Pharmacie hospitalière', 'Administration des services pharmaceutiques'],
                'Hématologie – Biochimie' => ['Hématologie médicale', 'Biochimie médicale'],
                'Bactériologie – Virologie médicales' => ['Bactériologie médicale', 'Virologie médicale'],
                'Immunologie appliquée' => ['Immunologie médicale'],
                'Pharmacologie 3' => ['Pharmacologie appliquée'],
                'Pharmacognosie 2' => ['Pharmacognosie spéciale'],
                'Pharmacie galénique' => ['Formes stériles', 'Formes innovantes'],
                'Santé publique 2' => ['Pharmaco-épidémiologie et vigilance', 'Nutrition et diététique'],
                'Chimie thérapeutique 3' => ['Chimie thérapeutique appliquée'],
                'Stage 5' => ['Stage laboratoire', 'Stage en district rural et santé communautaire'],
            ],
            'M2 Pharmacie' => [
                'Gestion' => ['Informatique appliquée', 'Gestion d\'entreprise (pharmacie, laboratoire, industrie)', 'Droit commercial'],
                'Expertises pharmaceutiques et biomédicales' => ['Autorisation de mise sur le marché', 'Contrôle de qualité des médicaments', 'Interprétation des résultats d\'analyses biomédicales'],
                'Parapharmacie' => ['Phytopharmacie / Produits agrochimiques', 'Pharmacie vétérinaire', 'Dermopharmacie et cosmétologie', 'Dispositifs médicaux'],
                'Toxicologie' => ['Toxicologie d\'urgence', 'Toxicovigilance'],
                'Communication' => ['Technique d\'expression orale et écrite', 'Anglais médical'],
                'Stage 6' => ['Stage 6 : Pharmacie clinique'],
                'Méthodologie de la recherche' => ['Initiation à la recherche', 'Recherche bibliographique', 'Biostatistiques', 'Rédaction scientifique'],
                'Management de la qualité' => ['Démarche qualité', 'Biosécurité', 'Bonnes Pratiques de Laboratoire', 'Bonnes Pratiques de Fabrication'],
                'Pharmacothérapeutique' => ['Pharmacie clinique (Soins pharmaceutiques)', 'Essais cliniques', 'Pharmacocinétique appliquée à la thérapeutique', 'Information pharmaceutique (Usage rationnel)'],
                'Pharmacie expérimentale' => ['Evacuation d\'une ordonnance'],
                'Phytothérapie et Médecine traditionnelle' => ['Phytothérapie', 'Médecine traditionnelle'],
                'Stage 7' => ['Stage 7 : Officine et industrie pharmaceutique'],
            ],
        ];

        foreach ($data as $niveauNom => $ues) {
            $niveau = Niveau::where('nom', $niveauNom)->first();
            if (!$niveau) {
                continue;
            }

            foreach ($ues as $ueNom => $ecues) {
                $ue = Ue::firstOrCreate([
                    'nom' => $ueNom,
                    'niveau_id' => $niveau->id,
                ]);

                foreach ($ecues as $ecueNom) {
                    Ecue::firstOrCreate([
                        'nom' => $ecueNom,
                        'ue_id' => $ue->id,
                    ]);
                }
            }
        }
    }
}
