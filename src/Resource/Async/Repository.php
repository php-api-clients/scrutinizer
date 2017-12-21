<?php declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Resource\Async;

use ApiClients\Client\Scrutinizer\Resource\Repository as BaseRepository;

class Repository extends BaseRepository
{
    public function refresh(): Repository
    {
        throw new \Exception('TODO: create refresh method!');
    }
}
