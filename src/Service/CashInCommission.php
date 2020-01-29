<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use Chasj\CommissionTask\Service\CommissionInterface;

class CashInCommission extends CommissionLimit implements CommissionInterface
{
    public $percent = 0.03;

    public $config;

    public function __construct(UserTypeInterface $userTypeConfig)
    {
        $this->config = $userTypeConfig;
    }
}
