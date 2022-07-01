<?php
declare(strict_types = 1);

namespace App\Homepage;

use App\Homepage\Domain\Homepage;
use Gacela\Framework\AbstractFactory;

final class HomepageFactory extends AbstractFactory
{
    public function createHomepageLister(): Homepage
    {
        return new Homepage(
            $this->getConfig()
       );
    }
}
