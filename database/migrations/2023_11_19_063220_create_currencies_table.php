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
        Schema::connection('vivino')->create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('country_code',16)->nullable();
            $table->string('code',16)->nullable();
            $table->string('name',16)->nullable();
            $table->string('prefix',16)->nullable();
            $table->string('suffix',16)->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('currencies');
    }
};
