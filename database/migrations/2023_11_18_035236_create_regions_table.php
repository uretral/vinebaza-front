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
        Schema::connection('vivino')->create('regions', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('parent_id')->nullable();
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('seo_name')->nullable();
            $table->string('updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('regions');
    }
};
