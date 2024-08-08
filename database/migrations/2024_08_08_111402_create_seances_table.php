<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->string('Titre');
            $table->longText('Description');
            $table->string('Type');
            $table->date('Date');
            $table->time('Heure_debut');
            $table->time('Heure_fin');
            $table->longText('Rapport')->nullable()->change();
            $table->string('status_seance')->nullable()->change();
            $table->string('Lien_seance')->nullable();
            $table->unsignedBigInteger('lieu_id')->nullable(); // Clé étrangère vers lieus
            $table->unsignedBigInteger('seance_reportee_id')->nullable(); // Clé étrangère vers seances (pour les séances reportées)

            $table->timestamps();

             // Définir les clés étrangères
             $table->foreign('lieu_id')->references('id')->on('lieus')->onDelete('set null');
             $table->foreign('seance_reportee_id')->references('id')->on('seances')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
