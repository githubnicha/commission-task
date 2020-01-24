<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class Commission extends Conversion implements CommissionInterface
{
    public function compute(float $amount, float $percent)
    {
        return (float) bcmul((string) $amount, (string) ($percent / 100), 2);
    }
}
