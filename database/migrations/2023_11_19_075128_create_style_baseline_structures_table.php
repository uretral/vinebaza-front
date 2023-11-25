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
        Schema::connection('vivino')->create('style_baseline_structures', function (Blueprint $table) {
            $table->id();
            $table->integer('style_id')->nullable();
            $table->float('acidity')->nullable();
            $table->float('fizziness')->nullable();
            $table->float('intensity')->nullable();
            $table->float('sweetness')->nullable();
            $table->float('tannin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('style_baseline_structures');
    }
};
