<?php

namespace App\Data\VivinoJson\Info;

use App\Data\VivinoJson\Info\Vintage\StatisticsData;
use Spatie\LaravelData\Data;

class VintageData extends Data
{
    public function __construct(
      public ?StatisticsData $statistics
    ) {}
}
/*
"awards": []
certified_biodynamic": "str"
description
expert_reviews


+"grape_composition": {#1471 ▶}
    +"grapes": array:1 [▶]
    +"has_valid_ratings": true
    +"id": 158219785
    +"image": {#1469 ▶}
        +"name": "Bodega La Milagrosa Escondido Ribera del Duero Tempranillo 2017"
        +"organic_certification_id": ""
        +"ranking": {#1466 ▶}
            +"ratings_distribution": {#1462 ▶}
                +"seo_name": "la-milagrosa-escondido-ribera-del-duero-tempranillo-2017"
                +"statistics": {#1461 ▶}
                    +"wine": {#1460 ▶}
                        +"wine_critic_reviews": []
                        +"wine_facts": {#1622 ▶}
                            +"wine_maker": ""
                            +"winemaker": ""
                            +"year": 2017





 * */

