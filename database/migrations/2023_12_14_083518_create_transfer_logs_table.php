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
        Schema::create('transfer_logs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('from_user_id');
            $table->unsignedBigInteger('to_user_id');
            $table->string('refrence_id')->default(0);
            $table->decimal('cash_in')->default(0);
            $table->decimal('cash_out')->default(0);
            $table->decimal('cash_balance')->default(0);
            $table->string('p_code')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->smallInteger('sync')->default(0);
            $table->integer('sync_time')->default(0);
            $table->integer('type');
            // Add foreign key constraints if needed
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_logs');
    }
};