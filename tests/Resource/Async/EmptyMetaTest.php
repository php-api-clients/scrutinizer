<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Scrutinizer\Resource\Async;

use ApiClients\Client\Scrutinizer\Resource\Async\EmptyMeta;
use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;

final class EmptyMetaTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Async';
    }

    public function getClass(): string
    {
        return EmptyMeta::class;
    }
}
