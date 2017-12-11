<?php declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Resource\Sync;

use ApiClients\Client\Scrutinizer\Resource\Meta as BaseMeta;
use ApiClients\Client\Scrutinizer\Resource\MetaInterface;
use ApiClients\Foundation\Hydrator\CommandBus\Command\BuildAsyncFromSyncCommand;

class Meta extends BaseMeta
{
    public function refresh(): Meta
    {
        return $this->wait($this->handleCommand(new BuildAsyncFromSyncCommand(self::HYDRATE_CLASS, $this))->then(function (MetaInterface $meta) {
            return $meta->refresh();
        }));
    }
}
