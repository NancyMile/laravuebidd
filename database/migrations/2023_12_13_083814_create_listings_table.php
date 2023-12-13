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
        Schema::create('listings', function (Blueprint $table) {
            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('baths');
            $table->unsignedTinyInteger('area');
            $table->tinyText('city');
            $table->tinyText('code');
            $table->tinyText('street');
            $table->tinyText('street_number');
            $table->unsignedInteger('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
