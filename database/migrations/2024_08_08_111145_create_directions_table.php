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
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->string('Code_direction');
            $table->string('Nom_direction');
            $table->unsignedBigInteger('institution_id'); // Clé étrangère vers institutions
            $table->timestamps();

            // Définir la clé étrangère
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directions');
    }
};
