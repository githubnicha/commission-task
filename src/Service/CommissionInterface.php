<?php

declare(strict_types=1);

namespace ChaSJ\CommissionTask\Service;

interface CommissionInterface
{
    public function compute(float $amount, float $percent);
}
