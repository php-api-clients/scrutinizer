<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Github;

use React\Promise\PromiseInterface;

interface AsyncClientInterface
{
    public function repository(string $login, string $name): PromiseInterface;

    public function addRepository(string $name): PromiseInterface;
}
