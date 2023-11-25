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
        Schema::connection('vivino')->create('styles', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('acidity')->nullable();
            $table->string('acidity_description')->nullable();
            $table->integer('blurb')->nullable();
            $table->integer('body')->nullable();
            $table->string('body_description')->nullable();
            $table->string('description')->nullable();
            $table->boolean('hidden')->nullable();
            $table->string('name')->nullable();
            $table->string('interesting_facts')->nullable();
            $table->integer('parent_style_id')->nullable();
            $table->string('regional_name')->nullable();
            $table->string('seo_name')->nullable();
            $table->string('varietal_name')->nullable();
            $table->string('vintage_mask')->nullable();
            $table->string('wine_type_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('styles');
    }
};
