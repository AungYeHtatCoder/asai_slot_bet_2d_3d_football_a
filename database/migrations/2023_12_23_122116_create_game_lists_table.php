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
        Schema::create('game_lists', function (Blueprint $table) {
            $table->id();
            $table->string('game_id')->index();
            $table->string('name_en');
            $table->string('name_mm')->nullable();
            $table->string('image')->nullable(true);
            $table->integer('click_count')->default(0);
            $table->foreignId('game_type_id')->references('id')->on('game_types');
            $table->foreignId('provider_id')->references('id')->on('providers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slot_games');
    }
};
