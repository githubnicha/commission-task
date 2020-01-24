<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Chasj\CommissionTask\Service\CashOutCommission;

class CashOutCommissionTest extends TestCase
{
    /**
     * @var CashOutCommission
     */
    private $cashOutCommission;

    public function setUp()
    {
        $this->cashOutCommission = new CashOutCommission();
    }

    public function testCommission()
    {
        $mockData = [
            "operation_date" => "2017-12-31",
            "user_id_num" => 4,
            "user_type" => "natural",
            "oprt_type" => "cash_out",
            "amount" => 1200,
            "currency" => "EUR"
        ];    
        $this->assertEquals(
            3.60,
            $this->cashOutCommission->commission($mockData)
        );
    }

}
