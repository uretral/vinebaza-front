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
        Schema::connection('vivino')->create('grape_aliases', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('parent_grape_id')->nullable();
            $table->string('name')->nullable();
            $table->string('seo_name')->nullable();
            $table->boolean('has_detailed_info')->default(0);
            $table->integer('wines_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('grape_aliases');
    }
};
