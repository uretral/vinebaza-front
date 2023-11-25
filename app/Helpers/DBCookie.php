<?php

namespace App\Helpers;

use App\Models\ComputedCookie;

class DBCookie
{


    public static function setCookie($component, $property, $str = null, $int = null, $json = null)
    {
        try {
            return ComputedCookie::updateOrCreate(
                ['component' => $component, 'property' => $property],
                ['str' => $str, 'int' => $int, 'json' => $json]
            );
        } catch (\Exception $e) {
            \Log::error(self::class . " " . $e->getMessage());
        }
    }

    public static function getCookie($component,$property)
    {
        return ComputedCookie::where('component', $component)->where('property',$property)->first();
    }

    public static function setStr($component, $property, $str)
    {
        $cookies = self::setCookie($component, $property, $str);
        return $cookies->str;
    }

    public static function setInt($component, $property, $int)
    {
        $cookies = self::setCookie($component, $property, null,  $int);
        return $cookies->int;
    }

    public static function setJson($component, $property, $json)
    {
        $cookies = self::setCookie($component, $property, null, null,  $json);
        return $cookies->json;
    }



    public static function getStr($component, $property, $initValue = null)
    {
        $cookies = self::getCookie($component, $property);
        if (!$cookies || !$cookies->getAttribute('str')) {
            return self::setStr($component, $property, $initValue);
        }
        $cookies = self::getCookie($component, $property);
        return $cookies->getAttribute('str');
    }

    public static function getInt($component, $property, $initValue = 0)
    {
        $cookies = self::getCookie($component, $property);
        if (is_null($cookies) || is_null($cookies->getAttribute('int'))) {
            return self::setInt($component, $property, $initValue, );
        }
        $cookies = self::getCookie($component, $property);
        return $cookies->getAttribute('int');
    }

    public static function getJson($component, $property, $initValue = null)
    {
        $cookies = self::getCookie($component, $property);
        if (!$cookies || !$cookies->getAttribute('json')) {
            return self::setJson($component, $property, $initValue);
        }
        $cookies = self::getCookie($component, $property);
        return $cookies->getAttribute('json');
    }

}
