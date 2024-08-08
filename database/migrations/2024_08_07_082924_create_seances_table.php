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

            $table->timestamps();
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
