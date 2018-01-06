<?php

declare(strict_types=1);

namespace App\Httplug\ClientFactory;

use Http\HttplugBundle\ClientFactory\ClientFactory;

final class CallableClientFactory implements ClientFactory
{
    private $factory;

    public function __construct(callable $factory)
    {
        $this->factory = $factory;
    }

    public function createClient(array $config = [])
    {
        return \call_user_func($this->factory, $config);
    }
}