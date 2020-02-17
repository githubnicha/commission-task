<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class DataStructure
{
    protected $data;
    protected $attrs = [
        'operation_date' => 'date',
        'user_id_num' => 'int',
        'user_type' => 'string',
        'oprt_type' => 'string',
        'amount' => 'float',
        'currency' => 'string'
    ];

    public function gather($handle)
    {
        $arr = [];
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $arr[] = $this->clean($data);
        }
        $this->data = $arr;
        return $arr;
    }

    public function clean(array $data)
    {
        $data = array_combine(array_keys($this->attrs), $data);
        foreach ($this->attrs as $key => $val) {
            switch ($val) {
                case 'int':
                    $data[$key] = (int) $data[$key];
                    break;
                case 'float':
                case 'decimal':
                case 'double':
                    $data[$key] = (float) $data[$key];
                    break;
                case 'date':
                case 'string':
                default:
            }
        }

        return $data;
    }

    public function numOperationsByUser($userIdNum, $date)
    {
        $wkNum = date('w', strtotime($date));
        return array_filter($this->data, function($v, $k) use($wkNum, $userIdNum) {
            return date('w', strtotime($v['operation_date'])) === $wkNum && $v['user_id_num'] === $userIdNum;
        }, ARRAY_FILTER_USE_BOTH);
    }

    public function totalAmount(array $data)
    {
        return array_sum(array_column($data, 'amount'));
    }
}
