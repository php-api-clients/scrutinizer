<?php declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer;

use ApiClients\Client\Scrutinizer\Resource\MetaInterface;

interface ClientInterface
{
    public function meta(): MetaInterface;
}
