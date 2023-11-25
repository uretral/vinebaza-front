<?php

namespace App\Services\Vivino\Processing;

use App\Classes\DataBaseCookie;

class Comments extends DataBaseCookie
{

    public function __construct()
    {
        $this->ComputedCookieComponent = 'VivinoParse';
        $this->ComputedCookieProperty = self::class;
    }

    public function handle(): string
    {
        return self::class;
    }
}
