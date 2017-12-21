<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Github;

use ApiClients\Client\Scrutinizer\CommandBus\Command\Github\AddRepositoryCommand;
use ApiClients\Client\Scrutinizer\CommandBus\Command\Github\RepositoryCommand;
use ApiClients\Foundation\ClientInterface as FoundationClientInterface;
use ApiClients\Foundation\Resource\ResourceInterface;
use React\Promise\CancellablePromiseInterface;
use React\Promise\PromiseInterface;

final class AsyncClient implements AsyncClientInterface
{
    /**
     * @var FoundationClientInterface
     */
    protected $client;

    /**
     * @param FoundationClientInterface $client
     */
    public function __construct(FoundationClientInterface $client)
    {
        $this->client = $client;
    }

    public function hydrate(string $resource): CancellablePromiseInterface
    {
        return $this->client->hydrate($resource);
    }

    public function extract(ResourceInterface $resource): CancellablePromiseInterface
    {
        return $this->client->extract($resource);
    }

    public function repository(string $login, string $name): PromiseInterface
    {
        return $this->client->handle(new RepositoryCommand($login, $name));
    }

    public function addRepository(string $name): PromiseInterface
    {
        return $this->client->handle(new AddRepositoryCommand($name));
    }
}
