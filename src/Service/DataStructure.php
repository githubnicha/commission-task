<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class DataStructure
{
    protected $attrs = [
        'operation_date' => 'date',
        'user_id_num' => 'int',
        'user_type' => 'string',
        'oprt_type' => 'string',
        'amount' => 'float',
        'currency' => 'string'
    ];

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
}
