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
        Schema::create('player_transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('refrence_id')->unique();
            $table->decimal('cash_in')->default(0);
            $table->decimal('cash_out')->default(0);
            $table->string('p_code');
            $table->decimal('progress_main_bal', 8, 2)->nullable()->default(0.00);
            $table->smallInteger('sync')->nullable()->default(0);
            $table->integer('sync_time')->nullable()->default(0);
            $table->smallInteger('status')->nullable()->default(0);
            $table->string('remark', 100)->nullable();
            $table->integer('trans_id')->default(0);
            $table->date('trans_time')->nullable();
            $table->timestamps();

            // Add foreign key constraints if needed
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_transaction_logs');
    }
};