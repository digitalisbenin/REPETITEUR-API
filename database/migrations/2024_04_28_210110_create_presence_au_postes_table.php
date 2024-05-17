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
        Schema::create('presence_au_postes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('repetiteur_id');
            $table->string('mois')->nullable();
            $table->string('datee')->nullable();
            $table->string('poste')->nullable();
            $table->longText('message')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('presence_au_postes');
    }
};
