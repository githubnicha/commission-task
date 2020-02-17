<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

use Exception;
  
class Currency
{
    public $rate;

    public function __construct(array $dataSource, string $currency)
    {
        try {
            $this->rate = $dataSource[$currency];
        } catch (Exception $e) {
            throw new Exception('Invalid Currency');
        }
    }
    
}
