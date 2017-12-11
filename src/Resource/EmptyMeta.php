<?php declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Resource;

use ApiClients\Foundation\Resource\EmptyResourceInterface;

abstract class EmptyMeta implements MetaInterface, EmptyResourceInterface
{
    /**
     * @return array
     */
    public function pullIps(): array
    {
        return null;
    }

    /**
     * @return array
     */
    public function hookIps(): array
    {
        return null;
    }
}
