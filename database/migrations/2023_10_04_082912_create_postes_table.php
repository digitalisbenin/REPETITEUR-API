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
            $table->uuid('repetiteur_id')->nullable();
            $table->uuid('enfants_id')->nullable();
            $table->uuid('parents_id')->nullable();
            $table->string('content',255);
            $table->timestamps();

            $table->foreign('repetiteur_id')
            ->references('id')
            ->on('repetiteurs')
            ->onDelete('cascade');

            $table->foreign('enfants_id')
            ->references('id')
            ->on('enfants')
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
        Schema::dropIfExists('postes');
    }
};
