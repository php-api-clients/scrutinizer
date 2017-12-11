<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Scrutinizer\Resource\Sync;

use ApiClients\Client\Scrutinizer\Resource\Sync\EmptyMeta;
use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;

final class EmptyMetaTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Sync';
    }

    public function getClass(): string
    {
        return EmptyMeta::class;
    }
}
