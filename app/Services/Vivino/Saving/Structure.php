<?php

namespace App\Services\Vivino\Saving;

use App\Data\VivinoJson\StructureData;

class Structure
{
    public static function handle(StructureData $structureData, int $wineId): int
    {
        \App\Models\Vivino\Structure::updateOrCreate(['wine_id' => $wineId], $structureData->toArray());
        return 1;
    }

}
