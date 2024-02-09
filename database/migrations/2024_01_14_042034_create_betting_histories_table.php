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
        Schema::create('betting_histories', function (Blueprint $table) {
            $table->id();
            $table->string('betting_id')->unique();
            $table->string('ref_no');
            $table->string('p_code');
            $table->string('game_type');
            $table->string('player_name');
            $table->string('game_id');
            $table->dateTime('start_time');
            $table->dateTime('match_time');
            $table->dateTime('end_time');
            $table->string('bet_detail');
            $table->decimal('turnover');
            $table->decimal('bet');
            $table->decimal('payout');
            $table->decimal('commission');
            $table->decimal('p_share');
            $table->decimal('p_win');
            $table->integer('status');
            $table->integer('is_mark')->default(0);
            $table->integer('v_key')->default(0);
            $table->timestamps();

            $table->foreign('p_code')->references('p_code')->on('providers')->onDelete('cascade');
            $table->foreign('game_type')->references('code')->on('game_types')->onDelete('cascade');
            $table->foreign('game_id')->references('game_id')->on('game_lists')->onDelete('cascade');
            $table->foreign('player_name')->references('name')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('betting_histories');
    }
};
