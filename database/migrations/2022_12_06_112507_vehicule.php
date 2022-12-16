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
        Schema::create('vehicule', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('marque');
            $table->dateTime('last_maintenance');
            $table->integer('nb_kilometrage');
            $table->integer('nb_serie');
            $table->foreignId('status_id')->nullable()->constrained('status');
            $table->foreignId('fournisseur_id')->nullable()->constrained('fournisseur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicule');
    }
};
