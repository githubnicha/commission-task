<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Chasj\CommissionTask\Service\Commission;

class CommissionTest extends TestCase
{
    /**
     * @var Commission
     */
    private $commission;

    public function setUp()
    {
        $this->commission = new Commission();
    }

    public function testCompute()
    {    
        $this->assertEquals(
            3.60,
            $this->commission->compute(12000, 0.03)
        );
    }

}
