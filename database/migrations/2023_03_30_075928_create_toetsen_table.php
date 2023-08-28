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
        Schema::create('toetsen', function (Blueprint $table) {
            $table->id();
            $table->string('leerjaar');
            $table->string('periode');
            $table->string('toets');
            $table->string('datum');
            $table->string('tijdstip');
            $table->string('herkansing');
            $table->string('her-tijd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toetsen');
    }
};
