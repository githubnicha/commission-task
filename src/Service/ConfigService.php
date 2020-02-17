<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use Exception;

abstract class ConfigService
{
    public static function get($file)
    {
        $f = __DIR__.'/../../'.$file.'.properties';
        if (file_exists($f)) {
            return json_decode(file_get_contents($f), true);
        } else {
            throw new Exception('Config file does not exist');
        }
    }
}
