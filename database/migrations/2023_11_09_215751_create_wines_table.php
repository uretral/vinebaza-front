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
        Schema::connection('vivino')->create('wines', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->float('alcohol')->nullable();
            $table->string('closure')->nullable();
            $table->string('description')->nullable();
            $table->boolean('has_valid_ratings')->nullable();
            $table->boolean('hidden')->nullable();
            $table->boolean('is_first_wine')->nullable();
            $table->boolean('is_natural')->nullable();
            $table->string('name')->nullable();
            $table->boolean('non_vintage')->nullable();
            $table->integer('review_status')->nullable();
            $table->string('seo_name')->nullable();
            $table->integer('sweetness_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->string('vintage_mask_raw')->nullable();
            $table->integer('vintage_type')->nullable();
            $table->string('created')->nullable();
            $table->string('updated')->nullable();

            $table->timestamps();
        });
    }

    /*
     * REL
     *
     * #[DataCollectionOf(FoodData::class)] foods;
     * #[DataCollectionOf(GrapeData::class)] grapes
     * public ?RanksCollectionData rank;
     * public ?RegionData          region;
     * public ?StatisticsWineData  statistics;
     * public ?StyleData           style;
     * #[DataCollectionOf(VintagesData::class)] vintages
     * public WineryData           winery
     * */


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('vivino')->dropIfExists('wines');
    }
};
