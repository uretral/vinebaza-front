<?php

namespace App\Services\Vivino\Traits;
trait VivinoInfo
{
    public function vivino(): void
    {
        \App\Models\Catalog\Vivino::updateOrCreate(['product_id' => $this->product->id], [
            'wine_id' => $this->wine->id,
            'alcohol' => $this->wine->alcohol,
            'closure' => $this->wine->closure,
            'created' => $this->wine->created_at,
            'updated' => $this->wine->updated_at,
            'description' => $this->wine->description,
            'has_valid_ratings' => $this->wine->has_valid_ratings,
            'hidden' => $this->wine->hidden,
            'is_first_wine' => $this->wine->is_first_wine,
            'is_natural' => $this->wine->is_natural,
            'name' => $this->wine->name,
            'non_vintage' => $this->wine->non_vintage,
            'review_status' => $this->wine->review_status,
            'seo_name' => $this->wine->seo_name,
            'sweetness_id' => $this->wine->sweetness_id,
            'type_id' => $this->wine->type_id,
            'vintage_mask_raw' => $this->wine->vintage_mask_raw,
            'vintage_type' => $this->wine->vintage_type,


            "foods",
            "grapes",
            "rank",
            "region",
            "statistics",
            "style",
            "vintages",
            "winery",



        ]);
    }

    public function foods(): void
    {
        return ;
    }
}
