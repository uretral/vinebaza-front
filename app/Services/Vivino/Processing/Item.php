<?php

namespace App\Services\Vivino\Processing;


use App\Classes\DataBaseCookie;
use App\Data\Parser\ParseResultData;
use App\Models\Catalog\Vivino;
use App\Models\ComputedCookie;
use App\Services\Vivino\Selenium\VivinoJson;
use Illuminate\Support\Facades\Log;

class Item extends DataBaseCookie
{

    private bool $update;
    private bool $tasting = false;
    private ParseResultData $jobResponse;

    public function __construct(ParseResultData $jobResponse, $update = false, $tasting = false)
    {
        $this->jobResponse = $jobResponse;
//        $this->ComputedCookieStr = $jobResponse->result;
        $this->ComputedCookieInt = (int)preg_replace('/[^0-9]/', '', $this->ComputedCookieStr);
        $this->ComputedCookieComponent = 'VivinoParse';
        $this->ComputedCookieProperty = self::class;
        $this->update = $update;
        $this->tasting = $tasting;
    }

    public function handle(): string
    {
        if ($this->update) {
            $this->json();
            $this->result();
            return self::class;
        };

        if (Vivino::where('vintage_id', $this->ComputedCookieInt)->first()) {
            $this->ComputedCookieJson = ['status' => 'exist', 'message' => 'В базе'];
        } else {
            $this->json();
        }

        $this->result();
        return self::class;
    }

    public function json(): void
    {
        $vivinoJson = new VivinoJson();
        $this->ComputedCookieJson = $vivinoJson->handle($this->jobResponse, $this->tasting);
    }
}
