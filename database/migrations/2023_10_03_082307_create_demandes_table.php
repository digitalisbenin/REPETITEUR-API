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
            $table->string('fname');
            $table->string('lname');
            $table->string('classe');
            $table->uuid('parents_id');
            $table->uuid('matiere_id')->nullable();
            $table->uuid('repetiteur_id')->nullable();
            $table->enum('status', ['En cours','Validé','Non Validé'])->default('En cours');
            $table->string('motif')->nullable();
            $table->timestamps();

            $table->foreign('repetiteur_id')
            ->references('id')
            ->on('repetiteurs')
            ->onDelete('cascade');
            $table->foreign('parents_id')
            ->references('id')
            ->on('parents')
            ->onDelete('cascade');
            
            $table->foreign('matiere_id')
            ->references('id')
            ->on('matieres')
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
