<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use stdClass;
use Exception;

class OperationTypeFactory
{
    public static function get(UserTypeInterface $userType, string $type)
    {
        $operationType = new stdClass;
        switch ($type) {
            case 'cash_in': 
                $operationType = new CashInCommission($userType);
                break;
            case 'cash_out': 
                $operationType = new CashOutCommission($userType);
                break;
            default:
                throw new Exception('Invalid Operation Type');    
        }
        return $operationType;
    }
}
