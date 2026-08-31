<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('fichier');
            $table->enum('statut', ['brouillon', 'publie', 'retire'])->default('brouillon');
            $table->foreignId('annee_academique_id')->constrained('annees_academiques')->onDelete('cascade');
            $table->foreignId('niveau_id')->constrained('niveaux')->onDelete('cascade');
            $table->foreignId('ue_id')->constrained('ues')->onDelete('cascade');
            $table->foreignId('ecue_id')->nullable()->constrained('ecues')->onDelete('cascade');
            $table->foreignId('type_ressource_id')->constrained('types_ressources')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};
