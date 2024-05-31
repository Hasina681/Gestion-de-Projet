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
        Schema::table('users', function(Blueprint $table){
            $table->integer('matricule');
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('civilite', 50);
            $table->integer('telephone');
            $table->enum('roles', ['ROLE_USER', 'ROLE_ADMIN', 'ROLE_SUPER_ADMIN']);
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
