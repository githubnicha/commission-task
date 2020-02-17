<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use Chasj\CommissionTask\Service\Currency;
use Chasj\CommissionTask\Service\ConfigService;
use PHPUnit\Framework\TestCase;
use Exception;

class CurrencyFactoryTest extends TestCase
{
    protected $factory;
    protected $currentRates;

    public function setUp()
    {
        $this->currentRates = ConfigService::get('currency_rate');
    }

    public function testGetCurrency()
    {
        $this->assertEquals(
            '129.53',
            (new Currency($this->currentRates, 'JPY'))->rate
        );
    }

    public function testInvalidCurrency()
    {
        try {
            (new Currency($this->currentRates, 'PHP'));
        } catch (Exception $e) {
            $this->assertEquals(
                $e->getMessage(),
                'Invalid Currency'
            );
        }
    }

}
