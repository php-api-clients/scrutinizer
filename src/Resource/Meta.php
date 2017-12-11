<?php declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Resource;

use ApiClients\Foundation\Hydrator\Annotation\EmptyResource;
use ApiClients\Foundation\Resource\AbstractResource;

/**
 * @EmptyResource("EmptyMeta")
 */
abstract class Meta extends AbstractResource implements MetaInterface
{
    /**
     * @var array
     */
    protected $pull_ips;

    /**
     * @var array
     */
    protected $hook_ips;

    /**
     * @return array
     */
    public function pullIps(): array
    {
        return $this->pull_ips;
    }

    /**
     * @return array
     */
    public function hookIps(): array
    {
        return $this->hook_ips;
    }
}
