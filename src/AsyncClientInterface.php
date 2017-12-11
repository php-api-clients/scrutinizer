<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer;

use React\Promise\PromiseInterface;

interface AsyncClientInterface
{
    public function meta(): PromiseInterface;
}
