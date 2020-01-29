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
                $userType = UserTypeConfigFactory::get($arr['user_type'], $arr['oprt_type']);
                $operationType = OperationTypeFactory::get($userType, $arr['oprt_type']);
                $currency = (new CurrencyFactory())->get($arr['currency']);
                $commission = new Commission($operationType, new Conversion($currency));
                echo $commission->compute($arr).PHP_EOL;
            }
            fclose($handle);
        }
    }
}
