<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

interface ConversionInterface
{
    public function convertToBase(float $amount);

    public function convertToCurrency(float $amount);

}
