<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use Exception;

class CashOutCommission extends CommissionLimit implements CommissionInterface
{
    public $percent = 0.3;
    public $config;

    public function __construct(UserTypeInterface $userTypeConfig)
    {
        $this->config = $userTypeConfig;
    }

    public function discount()
    {
        if (isset($this->config['discount'])) {
            
        }
        return 0;
    }
}
