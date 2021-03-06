<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Scrutinizer\Resource\Sync;

use ApiClients\Client\Scrutinizer\ApiSettings;
use ApiClients\Client\Scrutinizer\Resource\Meta;
use ApiClients\Tools\ResourceTestUtilities\AbstractResourceTest;

class MetaTest extends AbstractResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Sync';
    }

    public function getClass(): string
    {
        return Meta::class;
    }

    public function getNamespace(): string
    {
        return ApiSettings::NAMESPACE;
    }
}
