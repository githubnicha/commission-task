<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class Conversion implements ConversionInterface
{
    public $currency;

    public function __construct(CurrencyInterface $currency)
    {
        $this->currency = $currency;
    }

    public function convertToBase(float $amount)
    {
        return (float) bcdiv((string) $amount, $this->currency->rate, 2);
    }

    public function convertToCurrency(float $amount)
    {
        return (float) bcmul((string) $amount, $this->currency->rate, 2);
    }
}
