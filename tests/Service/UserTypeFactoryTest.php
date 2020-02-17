<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use Chasj\CommissionTask\Service\UserTypeConfig;
use Chasj\CommissionTask\Service\LegalUserType;
use PHPUnit\Framework\TestCase;
use Exception;
use Chasj\CommissionTask\Service\ConfigService;

class UserTypeConfigFactoryTest extends TestCase
{
    protected $factory;

    public function setUp()
    {
        $this->factory = new UserTypeConfig;
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
