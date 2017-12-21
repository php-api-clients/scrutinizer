<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer;

use ApiClients\Client\Scrutinizer\Github\AsyncClientInterface as AsyncGithubClientInterface;
use React\Promise\PromiseInterface;

interface AsyncClientInterface
{
    public function github(): AsyncGithubClientInterface;

    public function meta(): PromiseInterface;
}
