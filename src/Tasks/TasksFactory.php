<?php
declare(strict_types = 1);

namespace App\Tasks;

use App\Tasks\Domain\Tasks;
use Gacela\Framework\AbstractFactory;

final class TasksFactory extends AbstractFactory
{
    public function createTasksLister(): Tasks
    {
        return new Tasks(
            $this->getConfig()
       );
    }
}
