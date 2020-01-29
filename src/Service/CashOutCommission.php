<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class CashOutCommission extends CommissionLimit implements CommissionInterface
{
    public $percent = 0.3;

    public $userType;

    public function __construct(UserTypeInterface $userType)
    {
        $this->userType = $userType;
    }
    
}
