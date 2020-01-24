<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class Conversion
{
    protected $rates = [
        'EUR' => '1.0',
        'USD' => '1.1497',
        'JPY' => '129.53'
    ];

    public function convertToBase(string $currency, float $amount)
    {
        return (float) bcdiv((string) $amount, $this->rates[$currency], 2);
    }

    public function convertToCurrency(string $currency, float $amount)
    {
        return (float) bcmul((string) $amount, $this->rates[$currency], 2);
    }

    public function currencyCheck(string $currency)
    {
        if (!isset($this->rates[$currency])) {
            throw new Exception('Currency not valid');
		}

        return true;
    }
}
