<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use stdClass;
use Chasj\CommissionTask\Service\ConfigService;
use Exception;

class UserTypeFactory
{
    public static function get(string $type, string $optType)
    {
        $config = ConfigService::getConfig()[$optType][$type];
        $userType = new stdClass;
        switch ($type) {
            case 'legal': 
                $userType = new LegalUserType($config);
                break;
            case 'natural':
                $userType = new NaturalUserType($config);
                break;
            default:
                throw new Exception('Invalid User Type');
        }
        return $userType;
    }
}
