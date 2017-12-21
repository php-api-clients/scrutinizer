<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\CommandBus\Command\Github;

use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("ApiClients\Client\Scrutinizer\CommandBus\Handler\Github\AddRepositoryHandler")
 */
final class AddRepositoryCommand
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
