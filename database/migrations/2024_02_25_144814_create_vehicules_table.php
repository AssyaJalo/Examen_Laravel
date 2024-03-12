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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chauffeurs_id')->unsigned();
            $table->foreign('chauffeurs_id')->references('id')->on('chauffeurs');
            $table->integer('type_vehicules_id')->unsigned();
            $table->foreign('type_vehicules_id')->references('id')->on('type_vehicules');
            $table->date('Achat');
            $table->integer('Kilometre')->default(1000);
            $table->string('Matricule');
            $table->string('photo');
            $table->enum('Statut',['Hors service','En service','En reparation']);
            $table->string('Marque');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
