<?php

declare(strict_types=1);

namespace Chasj\CommissionTask\Service;

class LegalUserType implements UserTypeInterface
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function min()
    {
        return $this->config['min'];
    }

    public function max()
    {
        return $this->config['max'];
    }
}
