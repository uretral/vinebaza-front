<?php

namespace App\Classes;

use App\Models\ComputedCookie;

class DataBaseCookie
{
    public string $ComputedCookieComponent;
    public string $ComputedCookieProperty;
    public ?string $ComputedCookieStr = null;
    public ?int $ComputedCookieInt = null;
    public ?array $ComputedCookieJson = null;


    public function result(): void
    {
        try {
            ComputedCookie::updateOrCreate([
                'component' => $this->ComputedCookieComponent,
                'property' => $this->ComputedCookieProperty,
            ], [
                'str' => $this->ComputedCookieStr,
                'int' => $this->ComputedCookieInt,
                'json' => $this->ComputedCookieJson
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            dd($e->getMessage());
        }
    }
}
