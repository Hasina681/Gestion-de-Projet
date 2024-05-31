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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description')->nullable();
            $table->date('deadline');
            $table->decimal('progression');
            $table->enum('etat', ['Non entamé', 'En cours', 'En atente','Annuler', 'Valider']);
            $table->enum('priorite', ['Urgent', 'Moins urgent', 'Normal']);
            $table->string('observation');
            $table->timestamps();
            $table->unsignedBigInteger('projet_id');
            $table->foreign('projet_id')->references('id')->on('projets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
