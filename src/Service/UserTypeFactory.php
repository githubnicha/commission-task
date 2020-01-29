<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use Chasj\CommissionTask\Service\ConfigService;
use Exception;

class UserTypeFactory
{
    public static function get(string $type, string $optType)
    {
        $config = ConfigService::getConfig()[$optType][$type];
        switch ($type) {
            case 'legal': 
                return new LegalUserType($config);
            case 'natural':
                return new NaturalUserType($config);
            default:
                throw new Exception('Invalid User Type');
        }
    }
}
