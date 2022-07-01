<?php 
declare(strict_types=1);

namespace App\Tasks;

use Gacela\Framework\AbstractFacade;
use App\Tasks\Domain\Tasks;

final class TasksFacade extends AbstractFacade
{
    public function listTasks(): array
    {
        return $this->getFactory()
        ->createTasksLister()
        ->listTasks();
    }

    public function getTask($task_id): array
    {
        return $this->getFactory()
        ->createTasksLister()
        ->getTask($task_id);
    }
}
