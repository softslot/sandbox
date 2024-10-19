<?php

declare(strict_types=1);

namespace Sandbox\Api;

interface CatFactApiInterface
{
    public function getFact(): string;
}
