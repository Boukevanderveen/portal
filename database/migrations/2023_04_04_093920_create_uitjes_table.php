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
        // "toetsen is de naam van de database"
        Schema::create('uitjes', function (Blueprint $table) {
            $table->id();
            $table->string('leerjaar');
            $table->date('datum');
            $table->time('tijdstip');
            $table->string('locatie');
            $table->string('onderwerp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uitjes');
    }
};
