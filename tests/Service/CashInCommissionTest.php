<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Chasj\CommissionTask\Service\CashInCommission;

class CashInCommissionTest extends TestCase
{
    /**
     * @var CashInCommission
     */
    private $cashInCommission;
    private $max = 5.00;    

    public function setUp()
    {
        $this->cashInCommission = new CashInCommission();
    }

    public function testCommission()
    {
        $mockData = [
            "operation_date" => "2017-12-31",
            "user_id_num" => 4,
            "user_type" => "natural",
            "oprt_type" => "cash_in",
            "amount" => 12000,
            "currency" => "EUR"
        ];    
        $this->assertEquals(
            3.60,
            $this->cashInCommission->commission($mockData)
        );
    }

    public function testMaxCommission()
    {
        $mockData = [
            "operation_date" => "2017-12-31",
            "user_id_num" => 4,
            "user_type" => "natural",
            "oprt_type" => "cash_in",
            "amount" => 50000,
            "currency" => "EUR"
        ];    
        $this->assertEquals(
            $this->max,
            $this->cashInCommission->commission($mockData)
        );
    }   
}
