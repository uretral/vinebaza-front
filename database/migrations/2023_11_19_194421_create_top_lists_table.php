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
        Schema::connection('vivino')->create('top_lists', function (Blueprint $table) {
            $table->integer('id');
            $table->string('author')->nullable();
            $table->string('country')->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->text('intro_header')->nullable();
            $table->integer('level')->nullable();
            $table->string('name')->nullable();
            $table->string('seo_name')->nullable();
            $table->text('short_description')->nullable();
            $table->string('state')->nullable();
            $table->string('updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('top_lists');
    }
};
