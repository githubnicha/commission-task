<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

interface CommissionLimitInterface
{

    public function limit($max, $min, $commission);

}
