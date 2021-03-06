<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Chasj\CommissionTask\Service\Conversion;
use Chasj\CommissionTask\Service\JpyCurrency;

class ConversionTest extends TestCase
{
    /**
     * @var Conversion
     */
    private $conversion;

    public function setUp()
    {
        $this->conversion = new Conversion(new JpyCurrency());
    }

    public function testConvertToBase()
    {  
        $this->assertEquals(
            10.00,
            $this->conversion->convertToBase(1295.30)
        );
    }

    public function testConvertToCurrency()
    {  
        $this->assertEquals(
            7.72,
            $this->conversion->convertToBase(1000)
        );
    }
}
