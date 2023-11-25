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
        Schema::connection('vivino')->create('users', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('alias')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->boolean('is_premium')->nullable();
            $table->string('language', 10)->nullable();
            $table->string('seo_name')->nullable();
            $table->string('visibility')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('users');
    }
};
