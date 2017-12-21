<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Scrutinizer\Resource\Sync;

use ApiClients\Client\Scrutinizer\Resource\Sync\EmptyRepository;
use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;

final class EmptyRepositoryTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Sync';
    }

    public function getClass(): string
    {
        return EmptyRepository::class;
    }
}
