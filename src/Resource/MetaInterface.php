<?php declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Resource;

use ApiClients\Foundation\Resource\ResourceInterface;

interface MetaInterface extends ResourceInterface
{
    const HYDRATE_CLASS = 'Meta';

    /**
     * @return array
     */
    public function pullIps(): array;

    /**
     * @return array
     */
    public function hookIps(): array;
}
