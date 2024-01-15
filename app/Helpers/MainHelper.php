<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;

class MainHelper
{
    public static function isPjax()
    {
        return isset($_GET['_pjax']) && $_GET['_pjax'];
    }
        
    public static function removeWords($sentence, $wordsAmount) { 
        $words = preg_split('/[\s]+/', $sentence);
        if (!$words) { return $sentence; }
        $newWords = array_slice($words, $wordsAmount); 
        return implode(' ', $newWords);
    }
}