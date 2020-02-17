<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Chasj\CommissionTask\Service\OperationType;
use Chasj\CommissionTask\Service\UserTypeConfig;
use Chasj\CommissionTask\Service\CashInCommission;
use Exception;

class OperationTypeFactoryTest extends TestCase
{
    protected $factory;

    public function setUp()
    {
        $this->factory = new OperationType;
    }

    public function testGetOperationType()
    {
        $mockData = [
            "operation_date" => "2017-12-31",
            "user_id_num" => 4,
            "user_type" => "natural",
            "oprt_type" => "cash_in",
            "amount" => 12000,
            "currency" => "EUR"
        ];
        $userType = UserTypeConfig::get($mockData['user_type'], $mockData['oprt_type']);
        
        $this->assertEquals(
            new CashInCommission($userType),
            $this->factory->get($userType, $mockData['oprt_type'])
        );
    }

    public function testInvalidOperationType()
    {
        try {
            $userType = UserTypeConfig::get('natural', 'cash');
            $this->factory->get($userType, 'cash');
        } catch (Exception $e) {
            $this->assertEquals(
                $e->getMessage(),
                'Invalid Config'
            );
        }
    }

}
