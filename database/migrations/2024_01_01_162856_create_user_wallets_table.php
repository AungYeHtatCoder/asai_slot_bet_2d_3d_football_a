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
        Schema::create('user_wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('wallet')->default('0.00');
            $table->decimal('ag_wallet')->default('0.00');
            $table->decimal('gb_wallet')->default('0.00');
            $table->decimal('g8_wallet')->default('0.00');
            $table->decimal('jk_wallet')->default('0.00');
            $table->decimal('jd_wallet')->default('0.00');
            $table->decimal('l4_wallet')->default('0.00');
            $table->decimal('k9_wallet')->default('0.00');
            $table->decimal('pg_wallet')->default('0.00');
            $table->decimal('pr_wallet')->default('0.00');
            $table->decimal('re_wallet')->default('0.00');
            $table->decimal('s3_wallet')->default('0.00');
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->smallInteger('sync')->default(0);
            $table->integer('sync_time')->default(0);
            // Add foreign key constraints if needed
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_wallets');
    }
};