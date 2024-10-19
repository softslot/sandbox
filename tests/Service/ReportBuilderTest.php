<?php

declare(strict_types=1);

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use Sandbox\Service\ReportBuilder;
use Test\Stub\CatFactApiStub;

class ReportBuilderTest extends TestCase
{
    public function testGetSum(): void
    {
        $data = [1, 2, 3];
        $builder = new ReportBuilder($data, new CatFactApiStub());
        $sum = $builder->getSum();

        self::assertEquals(6, $sum);
    }

    public function testEmptyIntegers(): void
    {
        $data = [];
        $builder = new ReportBuilder($data, new CatFactApiStub());
        $sum = $builder->getSum();

        self::assertEquals(0, $sum);
    }

    public function testException(): void
    {
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('array can only contain numbers');

        $data = [1, null];
        $builder = new ReportBuilder($data, new CatFactApiStub());
        $sum = $builder->getSum();
    }

    public function testGetSubWithFact(): void
    {
        $data = [1, 2];
        $builder = new ReportBuilder($data, new CatFactApiStub());
        $result = $builder->getSumWithFact();

        $this->assertEquals('sum:3 fact: stub fact', $result);
    }
}
