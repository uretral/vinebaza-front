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
        Schema::connection('vivino')->create('style_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('style_id');
            $table->integer('aggregated_wines_count')->nullable();
            $table->integer('wines_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('style_statistics');
    }
};
