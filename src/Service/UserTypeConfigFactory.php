<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use Exception;

class UserTypeConfigFactory
{
    public static function get(string $type, string $optType)
    {
        try {
            $config = ConfigService::getConfig()[$optType][$type];
        } catch (Exception $e) {
            throw new Exception('Invalid Config');
        }
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
