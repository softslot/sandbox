<?php

declare(strict_types=1);

namespace Sandbox\Service;

use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Lock\Store\SemaphoreStore;

readonly class LockService
{
    private LockFactory $lockFactory;

    public function __construct()
    {
        $store = new SemaphoreStore();
        $this->lockFactory = new LockFactory($store);
    }

    public function lock(string $key, \Closure $callback, bool $blocking = false): void
    {
        $lock = $this->lockFactory->createLock($key);

        if ($lock->acquire(blocking: $blocking)) {
            $callback();
            $lock->release();
        }
    }
}
