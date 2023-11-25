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
        Schema::connection('vivino')->create('grapes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name')->nullable();
            $table->string('seo_name')->nullable();
            $table->text('description')->nullable();
            $table->boolean('has_detailed_info')->nullable();
            $table->integer('parent_grape_id')->nullable();
            $table->json('originating_grapes')->nullable();
            $table->string('flavor_profile')->nullable();
            $table->integer('color')->nullable();
            $table->integer('acidity')->nullable();
            $table->integer('body')->nullable();
            $table->integer('wines_count')->nullable();
            $table->string('acidity_description')->nullable();
            $table->string('body_description')->nullable();
            $table->integer('main_region_id')->nullable();
            $table->string('country_code')->nullable();
            $table->timestamps();
        });
    }
// #[DataCollectionOf(GrapeAliasData::class)]
// #[DataCollectionOf(GrapeTopTypeData::class)]
// #[DataCollectionOf(GrapeTopCountriesOfUseData::class)]

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('grapes');
    }
};
