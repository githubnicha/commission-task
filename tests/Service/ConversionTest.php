<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Chasj\CommissionTask\Service\Conversion;

class ConversionTest extends TestCase
{
    /**
     * @var Conversion
     */
    private $conversion;

    public function setUp()
    {
        $this->conversion = new Conversion();
    }

    public function testConvertToBase()
    {  
        $this->assertEquals(
            10.00,
            $this->conversion->convertToBase('JPY', 1295.30)
        );
    }

    public function testConvertToCurrency()
    {  
        $this->assertEquals(
            7.72,
            $this->conversion->convertToBase('JPY', 1000)
        );
    }
}
