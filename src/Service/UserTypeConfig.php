<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use Exception;

class UserTypeConfig
{
    public static function get(string $type, string $optType)
    {
        try {
            $config = ConfigService::get('commission')[$optType][$type];
        } catch (Exception $e) {
            throw new Exception('Invalid Config');
        }
        return new UserType($config);
    }
}
