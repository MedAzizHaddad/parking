<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('statut');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('statut', ['en_attente', 'approuvée', 'refusée', 'annulée'])->default('en_attente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('statut');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('statut', ['en_attente', 'approuvée', 'refusée'])->default('en_attente');
        });
    }
};
