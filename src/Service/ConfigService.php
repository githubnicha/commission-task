<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class ConfigService
{
    public static function getConfig()
    {
        return json_decode(file_get_contents(__DIR__.'/../../commission.properties'), true);
    }
}
