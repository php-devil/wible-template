<?php
/**
 * Created by PhpStorm.
 * User: aavol
 * Date: 28.08.2017
 * Time: 23:04
 */

namespace PhpDevil\Extensions\Wible\modifiers;


class PhoneModifier
{
    public static function modify($number, $format)
    {
        $number = preg_replace("/[^0-9]/", '', $number);
        $length = mb_strlen($format);
        $result = '';
        $pos = 0;
        for ($i = 0; $i < $length; $i++) {
            if ('#' === $format[$i]) $result .= $number[$pos++];
            else $result .= $format[$i];
        }
        return $result;
    }

}