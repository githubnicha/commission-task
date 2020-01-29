<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Chasj\CommissionTask\Service\OperationTypeFactory;
use Chasj\CommissionTask\Service\UserTypeConfigFactory;
use Chasj\CommissionTask\Service\CashInCommission;
use Chasj\CommissionTask\Service\CashOutCommission;
use Exception;

class OperationTypeFactoryTest extends TestCase
{
    protected $factory;

    public function setUp()
    {
        $this->factory = new OperationTypeFactory;
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
        $userType = UserTypeConfigFactory::get($mockData['user_type'], $mockData['oprt_type']);
        
        $this->assertEquals(
            new CashInCommission($userType),
            $this->factory->get($userType, $mockData['oprt_type'])
        );
    }

    public function testInvalidOperationType()
    {
        try {
            $userType = UserTypeConfigFactory::get('natural', 'cash');
            $this->factory->get($userType, 'cash');
        } catch (Exception $e) {
            $this->assertEquals(
                $e->getMessage(),
                'Invalid Config'
            );
        }
    }

}
