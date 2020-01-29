<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use Exception;

class CurrencyFactory
{
    public function get(string $currency) 
    {
        switch ($currency) {
            case 'EUR': 
                return new EurCurrency();
            case 'USD': 
                return new UsdCurrency();
            case 'JPY': 
                return new JpyCurrency();
            default:
                throw new Exception('Invalid Currency');       
        }
    }
}
