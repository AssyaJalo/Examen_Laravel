<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Locations_id')->unsigned();
            $table->foreign('Locations_id')->references('id')->on('locations');
            $table->date('Date_paiement');
            $table->double('Montant_Tarif');
            $table->enum('Moyen_paiement',['cartes bancaires','monnaie électronique','virements']);
            $table->string('Facture_paiement');
            $table->double('Distance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifs');
    }
};
