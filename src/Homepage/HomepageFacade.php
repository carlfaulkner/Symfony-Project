<?php 

declare(strict_types=1);

namespace App\Homepage;

use Gacela\Framework\AbstractFacade;
use App\Homepage\Domain\Homepage;

final class HomepageFacade extends AbstractFacade
{
    public function topTasks(): array
    {
        return $this->getFactory()
        ->createHomepageLister()
        ->topTasks();
    }
}
