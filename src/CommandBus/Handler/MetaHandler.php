<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\CommandBus\Handler;

use ApiClients\Client\Scrutinizer\CommandBus\Command\MetaCommand;
use ApiClients\Client\Scrutinizer\Resource\MetaInterface;
use ApiClients\Tools\Services\Client\FetchAndHydrateService;
use React\Promise\PromiseInterface;

final class MetaHandler
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
     * @param  MetaCommand      $command
     * @return PromiseInterface
     */
    public function handle(MetaCommand $command): PromiseInterface
    {
        return $this->service->fetch('meta', '', MetaInterface::HYDRATE_CLASS);
    }
}
