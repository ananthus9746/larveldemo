<?php

namespace App\Helpers;

class GeneralHelper
{ 
    function getIpAddress () {
        return file_get_contents('https://api.ipify.org');
    }
}