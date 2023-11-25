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
        Schema::connection('vivino')->create('user_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('followers_count')->nullable();
            $table->integer('followings_count')->nullable();
            $table->integer('ratings_count')->nullable();
            $table->integer('ratings_sum')->nullable();
            $table->integer('reviews_count')->nullable();
            $table->integer('purchase_order_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('user_statistics');
    }
};
