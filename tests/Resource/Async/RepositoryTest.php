<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Scrutinizer\Resource\Async;

use ApiClients\Client\Scrutinizer\ApiSettings;
use ApiClients\Client\Scrutinizer\Resource\Repository;
use ApiClients\Tools\ResourceTestUtilities\AbstractResourceTest;

class RepositoryTest extends AbstractResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Async';
    }

    public function getClass(): string
    {
        return Repository::class;
    }

    public function getNamespace(): string
    {
        return ApiSettings::NAMESPACE;
    }
}
