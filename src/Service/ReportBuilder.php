<?php

declare(strict_types=1);

namespace Sandbox\Service;

use Sandbox\Api\CatFactApiInterface;

readonly class ReportBuilder
{
    private array $integers;

    public function __construct(array $integers, private readonly CatFactApiInterface $catFactApi)
    {
        foreach ($integers as $integer) {
            if (!is_numeric($integer)) {
                throw new \InvalidArgumentException('array can only contain numbers');
            }
        }

        $this->integers = $integers;
    }

    public function getSum(): int
    {
        return array_sum($this->integers);
    }

    public function getSumWithFact(): string
    {
        $fact = $this->catFactApi->getFact();
        $sum = $this->getSum();

        return "sum:{$sum} fact: {$fact}";
    }
}
