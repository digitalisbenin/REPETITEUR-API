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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('type', ['demande','paiement','repetiteur','message','payer']);
            $table->uuid('repetiteur_id')->nullable();
            $table->uuid('demande_id')->nullable();
            $table->uuid('payement_id')->nullable();
            $table->uuid('message_id')->nullable();
            $table->enum('status', ['Non lu','Lu'])->default('Non lu');
            $table->uuid('user_id');
            $table->string('message');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

        // Clé étrangère pour la table repetiteurs
        $table->foreign('repetiteur_id')
            ->references('id')
            ->on('repetiteurs')
            ->onDelete('cascade');

        // Clé étrangère pour la table demandes
        $table->foreign('demande_id')
            ->references('id')
            ->on('demandes')
            ->onDelete('cascade');

        // Clé étrangère pour la table messages
        $table->foreign('message_id')
            ->references('id')
            ->on('messages')
            ->onDelete('cascade');

        // Clé étrangère pour la table payements
        $table->foreign('payement_id')
            ->references('id')
            ->on('payements')
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
        Schema::dropIfExists('notifications');
    }
};
