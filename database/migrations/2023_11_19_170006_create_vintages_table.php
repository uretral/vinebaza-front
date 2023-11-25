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
        Schema::connection('vivino')->create('vintages', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('certified_biodynamic')->nullable();
            $table->text('description')->nullable();
            $table->json('grape_composition')->nullable();
            $table->boolean('has_valid_ratings')->nullable();
            $table->string('name')->nullable();
            $table->string('organic_certification_id')->nullable();
            $table->string('ratings_distribution')->nullable();
            $table->string('seo_name')->nullable();
            $table->string('winemaker')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('vintages');
    }
};
