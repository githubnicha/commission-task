<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use stdClass;
use Exception;

class CurrencyFactory
{
    public function get(string $currency) 
    {
        $currencyClass = new stdClass;
        switch ($currency) {
            case 'EUR': 
                $currencyClass = new EurCurrency();
                break;
            case 'USD': 
                $currencyClass = new UsdCurrency();
                break;
            case 'JPY': 
                $currencyClass = new JpyCurrency();
                break;
            default:
                throw new Exception('Invalid Currency');       
        }
        return $currencyClass;
    }
}
