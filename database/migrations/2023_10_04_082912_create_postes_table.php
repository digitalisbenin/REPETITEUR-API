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
        Schema::create('postes', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('demande_id')->nullable();
            $table->uuid('parents_id')->nullable();
            $table->uuid('repetiteur_id')->nullable();
            $table->string('appreciation_parents',255)->nullable();
            $table->string('appreciation_repetiteur',255)->nullable();
            $table->string('reponse_admin',255)->nullable();
            $table->string('reponse_parents',255)->nullable();
            $table->string('poste')->nullable();
            $table->string('message')->nullable();
            $table->string('objet')->nullable();
            $table->timestamps();

            $table->foreign('demande_id')
            ->references('id')
            ->on('demandes')
            ->onDelete('cascade');

            $table->foreign('parents_id')
            ->references('id')
            ->on('parents')
            ->onDelete('cascade');

            $table->foreign('repetiteur_id')
            ->references('id')
            ->on('repetiteurs')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postes');
    }
};
