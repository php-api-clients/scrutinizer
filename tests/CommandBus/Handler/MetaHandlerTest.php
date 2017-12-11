<?php

declare(strict_types=1);

namespace ApiClients\Tests\Client\Scrutinizer\CommandBus\Handler;

use ApiClients\Client\Scrutinizer\CommandBus\Command\MetaCommand;
use ApiClients\Client\Scrutinizer\CommandBus\Handler\MetaHandler;
use ApiClients\Client\Scrutinizer\Resource\MetaInterface;
use ApiClients\Tools\Services\Client\FetchAndHydrateService;
use ApiClients\Tools\TestUtilities\TestCase;

final class MetaHandlerTest extends TestCase
{
    public function testHandle()
    {
        $command = new MetaCommand();
        $service = $this->prophesize(FetchAndHydrateService::class);
        $service->fetch('meta', '', MetaInterface::HYDRATE_CLASS)->shouldBeCalled();
        $handler = new MetaHandler($service->reveal());
        $handler->handle($command);
    }
}
