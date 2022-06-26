<?php

declare(strict_types=1);

namespace App\Tasks;

use Gacela\Framework\AbstractFacade;

final class TasksFacade extends AbstractFacade
{
    public function boot(): void
    {
        $this->getFactory()
            ->createTasks()
            ->getAccessToken()
            ->getTasks();
    }
}