<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\CommandBus\Handler\Github;

use ApiClients\Client\Scrutinizer\CommandBus\Command\Github\AddRepositoryCommand;
use ApiClients\Client\Scrutinizer\Resource\RepositoryInterface;
use ApiClients\Foundation\Hydrator\Hydrator;
use ApiClients\Foundation\Transport\Service\RequestService;
use ApiClients\Middleware\Json\JsonStream;
use React\Promise\PromiseInterface;
use RingCentral\Psr7\Request;

final class AddRepositoryHandler
{
    /**
     * @var RequestService
     */
    private $requestService;

    /**
     * @var Hydrator
     */
    private $hydrator;

    /**
     * @param RequestService $requestService
     * @param Hydrator       $hydrator
     */
    public function __construct(RequestService $requestService, Hydrator $hydrator)
    {
        $this->requestService = $requestService;
        $this->hydrator = $hydrator;
    }

    /**
     * Fetch the given repository and hydrate it.
     *
     * @param  AddRepositoryCommand $command
     * @return PromiseInterface
     */
    public function handle(AddRepositoryCommand $command): PromiseInterface
    {
        return $this->requestService->request(
            new Request(
                'POST',
                'repositories/g',
                [],
                new JsonStream([
                    'name' => $command->getName(),
                ])
            )
        )->then(function ($repository) {
            return $this->hydrator->hydrate(RepositoryInterface::HYDRATE_CLASS, $repository->getBody()->getParsedContents());
        });
    }
}
