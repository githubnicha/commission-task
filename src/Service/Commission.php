<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class Commission 
{
    protected $commission;
    protected $conversion;

    public function __construct(CommissionInterface $commision, ConversionInterface $conversion)
    {
        $this->commission = $commision;
        $this->conversion = $conversion;
    }

    private function getCommission(float $amount)
    {
        return (float) bcmul((string) $amount, (string) ($this->commission->percent / 100), 2);
    }

    public function compute($data) : float
    {
        $commissionAmt = $this->getCommission($data['amount']);
        $converted = $this->conversion->convertToBase($commissionAmt);
        $limit = $this->commission->limit($this->commission->userType->max(), $this->commission->userType->min(), $converted);
        return $limit ? $this->conversion->convertToBase($limit) : $commissionAmt;
    }

}
