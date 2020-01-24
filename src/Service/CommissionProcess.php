<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class CommissionProcess
{
    protected $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function run()
    {
        if (($handle = fopen($this->file, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $arr = (new DataStructure())->clean($data);
                switch ($arr['oprt_type']) {
                    case 'cash_in':
                        echo (new CashInCommission())->commission($arr).PHP_EOL;
                        break;
                    default:
                        echo (new CashOutCommission())->commission($arr).PHP_EOL;
                }
            }
            fclose($handle);
        }
    }
}
