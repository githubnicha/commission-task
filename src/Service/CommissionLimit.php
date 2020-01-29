<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class CommissionLimit extends Conversion implements CommissionLimitInterface
{
    public function limit($max, $min, $commission)
    {
        if ($min > 0.00 && $commission < $min) {
            return $max;
        }

        if ($max > 0.00 && $commission > $max) {
            return $min;
        }
        return 0;
    }
}