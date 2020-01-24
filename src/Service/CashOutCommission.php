<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class CashOutCommission extends Commission
{
    protected $percent = 0.3;
    protected $min = ['legal' => 0.50];

    public function commission(array $data)
    {
        $commission = $this->compute($data['amount'], $this->percent);
        $converted = $this->convertToBase($data['currency'], $commission);

        return bcadd((string) (isset($this->min[$data['user_type']]) ?
            ($converted < $this->min[$data['user_type']] ?
            $this->convertToCurrency($data['currency'], $this->min[$data['user_type']]) :
            $commission) : $commission), '0', 2);
    }
}
