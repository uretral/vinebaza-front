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
        Schema::connection('vivino')->create('vintage_rankings', function (Blueprint $table) {
            $table->id();
            $table->integer('vintage_id');
            $table->string('type');
            $table->string('description')->nullable();
            $table->integer('rank')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('vintage_rankings');
    }
};
