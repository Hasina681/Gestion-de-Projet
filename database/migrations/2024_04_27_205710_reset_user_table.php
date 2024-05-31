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
        Schema::table('users', function (Blueprint $table) {
            if( Schema::hasColumn('users', 'matricule') ){
                $table->dropColumn('matricule');
            }
            if( Schema::hasColumn('users', 'nom') ){
                $table->dropColumn('nom');
            }
            if( Schema::hasColumn('users', 'prenom') ){
                $table->dropColumn('prenom');
            }
            if( Schema::hasColumn('users', 'civilite') ){
                $table->dropColumn('civilite');
            }
            if( Schema::hasColumn('users', 'telephone') ){
                $table->dropColumn('telephone');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table){
            if( !Schema::hasColumn('users', 'matricule') ){
                $table->integer('matricule');
            }
            if( !Schema::hasColumn('users', 'nom') ){
                $table->string('nom', 50);
            }
            if( !Schema::hasColumn('users', 'prenom') ){
                $table->string('prenom', 50);
            }
            if( !Schema::hasColumn('users', 'civilite') ){
                $table->string('civilite', 50);
            }
            if( !Schema::hasColumn('users', 'telephone') ){
                $table->integer('telephone');
            }
        });
    }
};
