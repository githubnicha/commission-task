<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class CashInCommission extends Commission
{
    protected $percent = 0.03;
    protected $max = 5.00;

    public function commission(array $data)
    {
        $commission = $this->compute($data['amount'], $this->percent);
        $converted = $this->convertToBase($data['currency'], $commission);

        return bcadd((string) ($converted > $this->max ?
            $this->convertToCurrency($data['currency'], $this->max) :
            $commission), '0', 2);
    }
}
