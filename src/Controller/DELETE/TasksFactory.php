<?php
declare(strict_types = 1);

namespace App\Tasks;

use Gacela\Framework\AbstractFactory;
use App\Tasks\Domain\Tasks;


/**
 * @method TasksFactory getConfig()
 */
final class TasksFactory extends AbstractFactory
{
    public function createTasks(): Tasks
    {
        return new Tasks();
    }
}
