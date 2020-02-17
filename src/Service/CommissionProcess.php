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
            $currencyRates = ConfigService::get('currency_rate');
            $dataStruc = new DataStructure();
            $data = $dataStruc->gather($handle);
            foreach($data as $arr) {
                $userType = UserTypeConfig::get($arr['user_type'], $arr['oprt_type']);
                $operationType = OperationType::get($userType, $arr['oprt_type']);
                $currency = new Currency($currencyRates, $arr['currency']);
                $commission = new Commission($operationType, new Conversion($currency));
                echo $commission->compute($arr).PHP_EOL;
            }
            fclose($handle);
        }
    }
}
