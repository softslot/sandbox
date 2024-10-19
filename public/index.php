<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

\Sandbox\Example\Greeting::hello();

$builder = new \Sandbox\Service\ReportBuilder([1]);
$builder->getSum();
