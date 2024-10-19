<?php

declare(strict_types=1);

namespace Test\Stub;

use Sandbox\Api\CatFactApiInterface;

class CatFactApiStub implements CatFactApiInterface
{
    public function getFact(): string
    {
        return 'stub fact';
    }
}
