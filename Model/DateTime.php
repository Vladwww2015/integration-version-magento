<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model;

use IntegrationHelper\IntegrationVersion\DateTimeInterface;

class DateTime implements DateTimeInterface
{
    public function __construct(protected \DateTimeInterface $dateTime)
    {}

    public function getNow(): string
    {
        return $this->dateTime->format('Y-m-d H:i:s');
    }
}
