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
        Schema::create('demandes', function (Blueprint $table) {

            $table->uuid('id')->primary();
           
            $table->string('description');
            $table->uuid('enfants_id');
            $table->uuid('tarification_id')->nullable();
            $table->uuid('repetiteur_id')->nullable();
            $table->enum('status', ['En cours','Validé','Non Validé'])->default('En cours');
            $table->string('motif')->nullable();
            $table->timestamps();

            $table->foreign('repetiteur_id')
            ->references('id')
            ->on('repetiteurs')
            ->onDelete('cascade');
            $table->foreign('enfants_id')
            ->references('id')
            ->on('enfants')
            ->onDelete('cascade');

            $table->foreign('tarification_id')
            ->references('id')
            ->on('tarifications')
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
        Schema::dropIfExists('demandes');
    }
};
