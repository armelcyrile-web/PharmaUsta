<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actualites', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('titre');
            $table->text('contenu');
            $table->enum('type', ['communique', 'annonce', 'evenement'])->default('communique');
            $table->enum('statut', ['brouillon', 'publie', 'retire'])->default('brouillon');
            $table->date('date_publication')->nullable();
            $table->foreignId('auteur_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actualites');
    }
};
