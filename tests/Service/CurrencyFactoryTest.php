<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use Chasj\CommissionTask\Service\CurrencyFactory;
use Chasj\CommissionTask\Service\EurCurrency;
use Chasj\CommissionTask\Service\JpyCurrency;
use PHPUnit\Framework\TestCase;
use Exception;

class CurrencyFactoryTest extends TestCase
{
    protected $factory;

    public function setUp()
    {
        $this->factory = new CurrencyFactory;
    }

    public function testNotCurrency()
    {
        $this->assertNotEquals(
            new EurCurrency(),
            $this->factory->get('JPY')
        );
    }

    public function testGetCurrency()
    {
        $this->assertEquals(
            new JpyCurrency(),
            $this->factory->get('JPY')
        );
    }

    public function testInvalidCurrency()
    {
        try {
            $this->factory->get('PHP');
        } catch (Exception $e) {
            $this->assertEquals(
                $e->getMessage(),
                'Invalid Currency'
            );
        }
    }

}
