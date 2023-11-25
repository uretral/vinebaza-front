<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('vivino')->create('reviews', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('user_id')->nullable();
            $table->integer('wine_id')->nullable();
            $table->integer('vintage_id')->nullable();
            $table->float('rating')->nullable();
            $table->text('note')->nullable();
            $table->string('language')->nullable();
            $table->string('created')->nullable();
            $table->boolean('aggregated')->nullable();
            $table->integer('likes_count')->nullable();
            $table->integer('comments_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('reviews');
    }
};
