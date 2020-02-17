<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use Exception;

class OperationType
{
    public static function get(UserTypeInterface $userType, string $type)
    {
        switch ($type) {
            case 'cash_in':
                return new CashInCommission($userType);
            case 'cash_out':
                return new CashOutCommission($userType);
            default:
                throw new Exception('Invalid Operation Type');
        }
    }
}
