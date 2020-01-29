<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Chasj\CommissionTask\Service\CommissionLimit;

class CommissionLimitTest extends TestCase
{
    protected $commissionLimit;

    public function setUp()
    {
        $this->commissionLimit = new CommissionLimit();
    }

    public function testLimitWithMax()
    {
        $this->assertEquals(
            '5',
            $this->commissionLimit->limit(5, 0, 2)
        );
    }

    public function testNoLimit()
    {
        $this->assertEquals(
            0,
            $this->commissionLimit->limit(0, 0, 20)
        );
    }

    public function testLimitWithMin()
    {
        $this->assertEquals(
            10,
            $this->commissionLimit->limit(0, 10, 20)
        );
    }

}
