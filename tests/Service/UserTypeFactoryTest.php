<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use Chasj\CommissionTask\Service\UserTypeConfigFactory;
use Chasj\CommissionTask\Service\LegalUserType;
use PHPUnit\Framework\TestCase;
use Exception;
use Chasj\CommissionTask\Service\ConfigService;

class UserTypeConfigFactoryTest extends TestCase
{
    protected $factory;

    public function setUp()
    {
        $this->factory = new UserTypeConfigFactory;
    }

    public function testNotUserType()
    {
        $config = ConfigService::getConfig()['cash_out']['natural'];
        $this->assertNotEquals(
            new LegalUserType($config),
            $this->factory->get('natural', 'cash_out')
        );
    }

    public function testGetUserType()
    {
        $config = ConfigService::getConfig()['cash_out']['legal'];
        $this->assertEquals(
            new LegalUserType($config),
            $this->factory->get('legal', 'cash_out')
        );
    }

    public function testInvalidUserType()
    {
        try {
            $this->factory->get('permanent', 'cash_out');
        } catch (Exception $e) {
            $this->assertEquals(
                $e->getMessage(),
                'Invalid Config'
            );
        }
    }

}
