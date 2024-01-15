<?php

namespace App\Helpers;

class NumberHelper {

    public function getFormattedNumber($number,$decimal = null)
    {
        $num = floatval(str_replace(',','',$number));

        if ($num < 999 && -999 < $num) {
            return $num;
        }

        if (!is_null($decimal)) {
            $num = round($num,$decimal);
        }

        $comma_separator = 1;

        if ( $comma_separator === 1) {
            // Sub Continent
            $num = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $num);
        } else {
            // International
            $num = preg_replace("/(\d+?)(?=(\d{3})+(?!\d))(\.\d+)?/i", "$1,", $num);
        }
        
        return $num;
    }

}