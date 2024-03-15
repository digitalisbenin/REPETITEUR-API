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
        Schema::create('tarifications', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('matiere_id');
            $table->uuid('classe_id');
            $table->string('prix');
            $table->timestamps();

            $table->foreign('matiere_id')
            ->references('id')
            ->on('matieres')
            ->onDelete('cascade');

            $table->foreign('classe_id')
            ->references('id')
            ->on('classes')
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
        Schema::dropIfExists('tarifications');
    }
};
