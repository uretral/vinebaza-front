<?php

namespace App\Services\Vivino\Saving;

use App\Data\VivinoJson\CountryData;
use App\Data\VivinoJson\CurrencyData;
use App\Data\VivinoJson\GrapeData;
use App\Models\Vivino\CountryGrape;
use App\Models\Vivino\Currency;
use Spatie\LaravelData\DataCollection;

class Country
{
    public static function handle(CountryData $countryData): int
    {

        self::country($countryData);

        if (isset($countryData->currency)){
            self::currency($countryData);
        }

        if ($countryData->most_used_grapes) {
            self::grapes($countryData->most_used_grapes, $countryData->code);
        }

        return 1;
    }

    public static function country(CountryData $countryData): void
    {
        \App\Models\Vivino\Country::updateOrCreate(
            ['code' => $countryData->code],
            [
                'name' => $countryData->name,
                'native_name' => $countryData->native_name,
                'regions_count' => $countryData->regions_count,
                'seo_name' => $countryData->seo_name,
                'users_count' => $countryData->users_count,
                'wineries_count' => $countryData->wineries_count,
                'wines_count' => $countryData->wines_count,
            ]
        );
    }

    public static function currency(CountryData $countryData): void
    {
        Currency::updateOrCreate(
            ['country_code' => $countryData->code],
            [
                'code' => $countryData->currency->code,
                'name' => $countryData->currency->name,
                'prefix' => $countryData->currency->prefix,
                'suffix' => $countryData->currency->suffix,
            ]
        );
    }

    public static function grapes(DataCollection $collection, $countryCode): void
    {
        $collection->each(function (GrapeData $grapeData) use ($countryCode) {
            CountryGrape::updateOrCreate(
                [
                    'country_code' => $countryCode,
                    'grape_id' => $grapeData->id,
                ]
            );
        });
    }

}
