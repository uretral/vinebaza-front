<?php


namespace App\Services\Winstyle;


class Helper
{

    /**
     * @param $str
     * @return string|string[]|null
     */
    public static function floats($str){
       return preg_replace("/[^,.0-9]/", '', $str);
    }

    /**
     * @param $str
     * @return string|string[]
     */
    public static function specialChars($str){
        return str_replace(array("\r\n", "\r", "\n", "\t", '"'), '',  strip_tags($str));
    }

    public static function brackets($str){
        return str_replace(array("\r\n", "\r", "\n", "\t", "'","\""), '',  $str);
    }

    public static function unbroken($str){
        return preg_replace('/\s/', '', $str);
    }

    /**
     * @param $str
     * @return int
     */
    public static function isRu($str){
        $ru = preg_match('~[а-яё]+~iu', $str);
        $en = preg_match('~[a-z]+~i', $str);

        if (! ($ru ^ $en) ) {
            return 3;
        } elseif ($ru > $en) {
            return 1;
        } else {
            return 2;
        }
    }

    public static function normalize($ob) {
       return json_decode(json_encode($ob));
    }
}
