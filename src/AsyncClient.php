<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer;

use ApiClients\Client\Scrutinizer\CommandBus\Command\MetaCommand;
use ApiClients\Foundation\ClientInterface;
use ApiClients\Foundation\Factory;
use ApiClients\Foundation\Resource\ResourceInterface;
use React\EventLoop\LoopInterface;
use React\Promise\CancellablePromiseInterface;
use React\Promise\PromiseInterface;

final class AsyncClient implements AsyncClientInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param ClientInterface $client
     */
    private function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param  LoopInterface $loop
     * @param  array         $options
     * @return AsyncClient
     */
    public static function create(LoopInterface $loop, array $options = []): self
    {
        $options = ApiSettings::getOptions($options, 'Async');
        $client = Factory::create($loop, $options);

        return new self($client);
    }

    /**
     * @internal
     * @param  ClientInterface $client
     * @return AsyncClient
     */
    public static function createFromClient(ClientInterface $client): self
    {
        return new self($client);
    }

    public function hydrate(string $resource): CancellablePromiseInterface
    {
        return $this->client->hydrate($resource);
    }

    public function extract(ResourceInterface $resource): CancellablePromiseInterface
    {
        return $this->client->extract($resource);
    }

    public function meta(): PromiseInterface
    {
        return $this->client->handle(new MetaCommand());
    }
}
