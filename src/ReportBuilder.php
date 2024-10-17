<?php

declare(strict_types=1);

namespace Sandbox;

readonly class ReportBuilder
{
    public function __construct(private int $steps)
    {
    }

    public function build(): void
    {
        for ($i = 1; $i <= $this->steps; $i++) {
            echo '_________________' . PHP_EOL;
            echo "Step #{$i}" . PHP_EOL;
            echo '_________________' . PHP_EOL;

            sleep(1); // типа работаем
        }

        echo '+++++++++++++++++' . PHP_EOL;
        echo 'FINISHED!' . PHP_EOL;
        echo '+++++++++++++++++' . PHP_EOL;
    }
}
