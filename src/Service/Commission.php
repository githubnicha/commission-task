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

    public function getCommission(float $amount)
    {
        return (float) bcmul((string) $amount, (string) ($this->commission->percent / 100), 2);
    }

    public function compute($data): string
    {
        $commissionAmt = $this->getCommission($data['amount']);
        $converted = $this->conversion->convertToBase($commissionAmt);
        $limit = $this->commission->limit($this->commission->config->min(), $this->commission->config->max(), $converted);

        return bcadd($limit ? (string) $this->conversion->convertToCurrency($limit) : (string) $commissionAmt, '0', 2);
    }
}
