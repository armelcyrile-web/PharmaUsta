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
        $niveauL1 = Niveau::where('nom', 'L1 Pharmacie')->first();
        $niveauL2 = Niveau::where('nom', 'L2 Pharmacie')->first();
        $niveauL3 = Niveau::where('nom', 'L3 Pharmacie')->first();
        $niveauM1 = Niveau::where('nom', 'M1 Pharmacie')->first();
        $niveauM2 = Niveau::where('nom', 'M2 Pharmacie')->first();

        $ueAnatomie = Ue::create(['nom' => 'Anatomie', 'niveau_id' => $niveauL1->id]);
        Ecue::create(['nom' => 'Anatomie générale', 'ue_id' => $ueAnatomie->id]);
        Ecue::create(['nom' => 'Anatomie des membres', 'ue_id' => $ueAnatomie->id]);

        Ue::create(['nom' => 'Chimie générale', 'niveau_id' => $niveauL1->id]);

        $ueBiochimie = Ue::create(['nom' => 'Biochimie', 'niveau_id' => $niveauL2->id]);
        Ecue::create(['nom' => 'Biochimie structurale', 'ue_id' => $ueBiochimie->id]);
        Ecue::create(['nom' => 'Enzymologie', 'ue_id' => $ueBiochimie->id]);

        Ue::create(['nom' => 'Physiologie', 'niveau_id' => $niveauL2->id]);

        $uePharmacologie = Ue::create(['nom' => 'Pharmacologie', 'niveau_id' => $niveauM1->id]);
        Ecue::create(['nom' => 'Pharmacocinétique', 'ue_id' => $uePharmacologie->id]);
        Ecue::create(['nom' => 'Pharmacodynamie', 'ue_id' => $uePharmacologie->id]);

        Ue::create(['nom' => 'Pharmacie clinique', 'niveau_id' => $niveauM1->id]);

        $ueToxicologie = Ue::create(['nom' => 'Toxicologie', 'niveau_id' => $niveauM2->id]);
        Ecue::create(['nom' => 'Toxicologie analytique', 'ue_id' => $ueToxicologie->id]);

        Ue::create(['nom' => 'Législation pharmaceutique', 'niveau_id' => $niveauM2->id]);
    }
}
