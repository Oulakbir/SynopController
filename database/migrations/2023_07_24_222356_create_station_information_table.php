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
         Schema::create('station_information', function (Blueprint $table) {
             $table->id();
             $table->string('stationId');
             $table->string('stationType');
             $table->integer('altitude');
             $table->enum('stuff', ['with', 'without']);
             $table->enum('wind', ['mesured', 'unmesured']);
             $table->timestamps();
         });
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('station_information');
    }
};



