<?php

namespace App\Data\VivinoJson;

use Spatie\LaravelData\Data;

class AddressData extends Data
{
    public function __construct(
        public ?string $addition,
        public ?string $city,
        public ?string $company,
        public ?string $country,
        public ?string $external_id,
        public ?string $name,
        public ?string $neighborhood,
        public ?string $phone,
        public ?string $residential,
        public ?string $state,
        public ?string $street,
        public ?string $street2,
        public ?string $title,
        public ?string $vat_code,
        public ?string $vat_number,
        public ?string $zip
    )
    {
    }
}
