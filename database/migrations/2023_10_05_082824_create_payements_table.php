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
        Schema::create('payements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('demande_id');

            $table->enum('mois', ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet', 'Aout','Septembre','Octobre','Novembre','Decembre'])->default('Janvier');
             $table->enum('status', ['Impayer','Payer'])->default('Impayer');
            $table->DateTime('date');
            $table->string('annee');
            $table->string('reference')->nullable();
            $table->timestamps();

            $table->foreign('demande_id')
            ->references('id')
            ->on('demandes')
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
        Schema::dropIfExists('payements');
    }
};
