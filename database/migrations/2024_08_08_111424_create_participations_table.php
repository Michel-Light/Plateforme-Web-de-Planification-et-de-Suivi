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
        Schema::create('participations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant_id'); // Clé étrangère vers participants
            $table->unsignedBigInteger('seance_id'); // Clé étrangère vers seances
            $table->string('Role_participant');
            $table->boolean('Presence');
           
            $table->timestamps();

            // Définir les clés étrangères
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
            $table->foreign('seance_id')->references('id')->on('seances')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
