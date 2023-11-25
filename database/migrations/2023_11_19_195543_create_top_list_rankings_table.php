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
        Schema::connection('vivino')->create('top_list_rankings', function (Blueprint $table) {
            $table->id();
            $table->integer('vintage_id')->nullable();
            $table->integer('top_list_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('previous_rank')->nullable();
            $table->integer('rank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('top_list_rankings');
    }
};
