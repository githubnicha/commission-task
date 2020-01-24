<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Chasj\CommissionTask\Service\DataStructure;

class DataStructureTest extends TestCase
{
    /**
     * @var DataStructure
     */
    private $dataStructure;

    public function setUp()
    {
        $this->dataStructure = new DataStructure();
    }

    public function testClean()
    {
        $mockData = [
            "operation_date" => "2017-12-31",
            "user_id_num" => 4,
            "user_type" => "natural",
            "oprt_type" => "cash_out",
            "amount" => '1200',
            "currency" => "EUR"
        ];  
        $newData = $this->dataStructure->clean($mockData);
        $this->assertEquals(
            1200.00,
            $newData['amount']
        );
    }
}
