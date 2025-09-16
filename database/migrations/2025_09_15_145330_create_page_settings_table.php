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
        Schema::create('page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('background')->nullable(); // background image
            $table->string('header_text')->nullable(); // "We invited you to"
            $table->string('hero_image')->nullable(); // heroku.png
            $table->string('name')->nullable(); // "M. Fikri Ramadhani, S.Kom"
            $table->string('degree')->nullable(); // tambahan gelar
            $table->string('class_info')->nullable(); // "CLASS OF 2025 ..."
            $table->string('day')->nullable(); // "Sabtu"
            $table->string('date')->nullable(); // 27
            $table->string('month')->nullable(); // "September"
            $table->string('time')->nullable(); // "12 PM"
            $table->text('address')->nullable();
            $table->string('maps_url')->nullable();
            $table->string('music_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_settings');
    }
};
