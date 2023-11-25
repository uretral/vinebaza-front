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
        Schema::connection('vivino')->create('vintage_awards', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('competition_id')->nullable();
            $table->integer('edition')->nullable();
            $table->string('medal')->nullable();
            $table->string('score')->nullable();
            $table->string('trophy')->nullable();
            $table->integer('vintage_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('vintage_awards');
    }
};
