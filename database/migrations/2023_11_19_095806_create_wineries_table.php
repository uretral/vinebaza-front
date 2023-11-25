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
        Schema::connection('vivino')->create('wineries', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('business_name')->nullable();
            $table->string('description')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->boolean('is_claimed')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('review_status')->nullable();
            $table->string('seo_name')->nullable();
            $table->string('specialists_notes')->nullable();
            $table->string('sponsored_entity')->nullable();
            $table->integer('sponsored_entity_type')->nullable();
            $table->integer('status')->nullable();
            $table->string('twitter')->nullable();
            $table->string('website')->nullable();
            $table->string('winemaker')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('wineries');
    }
};
