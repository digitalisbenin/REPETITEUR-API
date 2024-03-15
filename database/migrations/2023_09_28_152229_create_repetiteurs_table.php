<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repetiteurs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('commune_id');
            $table->string('matricule')->unique();
            $table->string('cycle');
            $table->string('diplome_imageUrl');
            $table->string('profil_imageUrl');
            $table->string('phone');
            $table->string('adresse');
            $table->string('description');
            $table->string('dateLieuNaissance');
            $table->string('situationMatrimoniale');
            $table->string('niveauEtude');
            $table->string('heureDisponibilite');
            $table->string('identite');
            $table->string('casierJudiciaire');
            $table->string('attestationResidence');
            $table->string('sexe');
            $table->string('grade');

            $table->string('ecole');
            $table->string('experience');
            $table->enum('status', ['Etudiants','Professionnel','Enseignant','Enseignant certifier'])->default('Etudiants');
            $table->enum('etats', ['Disponible','Non disponible'])->default('Disponible');
            $table->enum('evaluation', ['Non Evaluer','Evaluer'])->default('Non Evaluer');
            $table->enum('traitementDossiers', ['En cours','Validé','Non Validé'])->default('En cours');
                $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

                $table->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repetiteurs');
    }
};
