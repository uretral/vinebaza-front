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
        Schema::connection('vivino')->create('vintage_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('vintage_id');
            $table->float('labels_count')->nullable();
            $table->float('ratings_average')->nullable();
            $table->float('ratings_count')->nullable();
            $table->float('reviews_count')->nullable();
            $table->float('vintages_count')->nullable();
            $table->float('wines_count')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('vintage_statistics');
    }
};
