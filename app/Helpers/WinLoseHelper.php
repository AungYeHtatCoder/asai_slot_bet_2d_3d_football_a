<?php

namespace App\Helpers;

class WinLoseHelper
{
    public static function getBeforBal(string $betDetail)
    {
      
        preg_match_all("/\[([^\]]*)\]:([^,]*)/", $betDetail, $matches);
        $result = array_combine($matches[1], $matches[2]);

        return $result['Bal_Before'];
    }
    public static function getBalAfter(string $betDetail)
    {
        preg_match_all("/\[([^\]]*)\]:([^,]*)/", $betDetail, $matches);
        $result = array_combine($matches[1], $matches[2]);

        return $result['Bal_After'];
    }

}
