<?php

namespace App\Helpers;

class Helper
{
    public static function numberToCurrency(float $value, string $country = 'id')
    {
        if ($country == 'id') return 'Rp ' . number_format($value, 0,',', '.');
        else return money_format('$%i', $value);
    }
}
