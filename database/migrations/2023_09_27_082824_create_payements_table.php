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
            $table->uuid('parents_id');
            $table->string('name');
            $table->enum('mois', ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet', 'Aout','Spetembre','Octobre','Novembre','Decembre'])->default('Janvier');
            $table->string('phone');
             $table->enum('status', ['Impayer','Payer'])->default('Impayer');
            $table->DateTime('date');
            $table->string('reference')->nullable();
            $table->timestamps();
            $table->foreign('parents_id')
            ->references('id')
            ->on('parents')
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
