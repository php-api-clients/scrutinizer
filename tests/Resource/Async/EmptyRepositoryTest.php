<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Scrutinizer\Resource\Async;

use ApiClients\Client\Scrutinizer\Resource\Async\EmptyRepository;
use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;

final class EmptyRepositoryTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Async';
    }

    public function getClass(): string
    {
        return EmptyRepository::class;
    }
}
