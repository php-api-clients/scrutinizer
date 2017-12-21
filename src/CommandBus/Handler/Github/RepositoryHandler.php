<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\CommandBus\Handler\Github;

use ApiClients\Client\Scrutinizer\CommandBus\Command\Github\RepositoryCommand;
use ApiClients\Client\Scrutinizer\Resource\RepositoryInterface;
use ApiClients\Tools\Services\Client\FetchAndHydrateService;
use React\Promise\PromiseInterface;

final class RepositoryHandler
{
    /**
     * @var FetchAndHydrateService
     */
    private $service;

    /**
     * @param FetchAndHydrateService $service
     */
    public function __construct(FetchAndHydrateService $service)
    {
        $this->service = $service;
    }

    /**
     * Fetch the given repository and hydrate it.
     *
     * @param  RepositoryCommand $command
     * @return PromiseInterface
     */
    public function handle(RepositoryCommand $command): PromiseInterface
    {
        return $this->service->fetch(
            'repositories/g/' . $command->getLogin() . '/' . $command->getName(),
            '',
            RepositoryInterface::HYDRATE_CLASS
        );
    }
}
