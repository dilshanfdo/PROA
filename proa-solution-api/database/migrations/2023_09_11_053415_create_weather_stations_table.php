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
        Schema::create('weather_stations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('site');
            $table->string('portfolio');
            $table->string('state');
            $table->geometry('latitude');
            $table->geometry('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_stations');
    }
};
