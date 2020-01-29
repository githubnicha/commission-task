<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class CommissionLimit
{
    public function limit($min, $max, $commission)
    {
        if ($min > 0.00 && $commission < $min) {
            return $min;
        }

        if ($max > 0.00 && $commission > $max) {
            return $max;
        }

        return 0;
    }
}
