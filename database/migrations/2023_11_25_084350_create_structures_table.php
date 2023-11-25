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
        Schema::connection('vivino')->create('structures', function (Blueprint $table) {
            $table->id();
            $table->integer('wine_id');
            $table->integer('acidity')->nullable();
            $table->integer('fizziness')->nullable();
            $table->integer('intensity')->nullable();
            $table->integer('sweetness')->nullable();
            $table->integer('tannin')->nullable();
            $table->integer('calculated_structure_count')->nullable();
            $table->integer('user_structure_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('structures');
    }
};
