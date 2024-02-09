<?php

namespace App\Helpers;

class ApiHelper
{
    public static function generateSignature($data)
    {
        $signature = strtoupper(md5($data));

        return $signature;
    }
}
