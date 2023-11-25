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
        Schema::connection('vivino')->create('background_images', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->string('model');
            $table->string('location')->nullable();
            $table->string('bottle')->nullable();
            $table->string('label')->nullable();
            $table->string('small')->nullable();
            $table->string('entity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('background_images');
    }
};
