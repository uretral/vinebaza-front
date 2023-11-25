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
        Schema::create('computed_cookies', function (Blueprint $table) {
            $table->id();
            $table->string('component');
            $table->string('property');
            $table->integer('int')->nullable();
            $table->string('str')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computed_cookies');
    }
};
