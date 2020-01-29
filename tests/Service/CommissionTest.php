<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Chasj\CommissionTask\Service\Commission;
use Chasj\CommissionTask\Service\Conversion;
use Chasj\CommissionTask\Service\UserTypeConfigFactory;
use Chasj\CommissionTask\Service\OperationTypeFactory;
use Chasj\CommissionTask\Service\CurrencyFactory;

class CommissionTest extends TestCase
{

    public function commission($data) {
        $userType = UserTypeConfigFactory::get($data['user_type'], $data['oprt_type']);
        $operationType = OperationTypeFactory::get($userType, $data['oprt_type']);
        $currency = (new CurrencyFactory())->get($data['currency']);
        return new Commission($operationType, new Conversion($currency));
    }

    public function testGetCommissionCashInLegal()
    {    
        $mockData = [
            "operation_date" => "2017-12-31",
            "user_id_num" => 4,
            "user_type" => "legal",
            "oprt_type" => "cash_in",
            "amount" => 12000,
            "currency" => "EUR"
        ];

        $commission = $this->commission($mockData);
        $this->assertEquals(
            3.60,
            $commission->getCommission(12000)
        );
    }

    public function testGetCommissionCashInNatural()
    {    
        $mockData = [
            "operation_date" => "2017-12-31",
            "user_id_num" => 4,
            "user_type" => "natural",
            "oprt_type" => "cash_in",
            "amount" => 12000,
            "currency" => "EUR"
        ];

        $commission = $this->commission($mockData);
        $this->assertEquals(
            3.60,
            $commission->getCommission(12000)
        );
    }

    public function testGetCommissionCashOutNatural()
    {    
        $mockData = [
            "operation_date" => "2017-12-31",
            "user_id_num" => 4,
            "user_type" => "natural",
            "oprt_type" => "cash_out",
            "amount" => 12000,
            "currency" => "EUR"
        ];

        $commission = $this->commission($mockData);
        $this->assertEquals(
            36.00,
            $commission->getCommission(12000)
        );
    }

    public function testGetCommissionCashOutLegal()
    {    
        $mockData = [
            "operation_date" => "2017-12-31",
            "user_id_num" => 4,
            "user_type" => "legal",
            "oprt_type" => "cash_out",
            "amount" => 12000,
            "currency" => "EUR"
        ];

        $commission = $this->commission($mockData);
        $this->assertEquals(
            36.00,
            $commission->getCommission(12000)
        );
    }

    public function testCompute() {
        $mockData = [
            "operation_date" => "2017-12-31",
            "user_id_num" => 4,
            "user_type" => "natural",
            "oprt_type" => "cash_in",
            "amount" => 12000,
            "currency" => "EUR"
        ];
        $commission = $this->commission($mockData);
        $this->assertEquals(
            3.60,
            $commission->compute($mockData)
        );
    }

}
