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
        Schema::connection('vivino')->create('wine_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('wine_id');
            $table->integer('labels_count')->nullable();
            $table->float('ratings_average')->nullable();
            $table->integer('ratings_count')->nullable();
            $table->string('status')->nullable();
            $table->integer('vintages_count')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('wine_statistics');
    }
};
