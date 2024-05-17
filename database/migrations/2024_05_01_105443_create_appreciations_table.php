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
        Schema::create('appreciations', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('demande_id');
            $table->uuid('parents_id');
            $table->longText('appreciation_parents',255);
            $table->longText('reponse_admin',255)->nullable();
            
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appreciations');
    }
};
