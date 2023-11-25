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
        Schema::connection('vivino')->create('region_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('region_id')->nullable();
            $table->integer('wines_count')->nullable();
            $table->integer('wineries_count')->nullable();
            $table->integer('sub_regions_count')->nullable();
            $table->integer('parent_regions_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('region_statistics');
    }
};
