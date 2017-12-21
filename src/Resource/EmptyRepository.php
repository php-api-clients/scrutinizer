<?php declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Resource;

use ApiClients\Foundation\Resource\EmptyResourceInterface;

abstract class EmptyRepository implements RepositoryInterface, EmptyResourceInterface
{
    /**
     * @return string
     */
    public function type(): string
    {
        return null;
    }

    /**
     * @return bool
     */
    public function private(): bool
    {
        return null;
    }

    /**
     * @return string
     */
    public function defaultBranch(): string
    {
        return null;
    }

    /**
     * @return array
     */
    public function applications(): array
    {
        return null;
    }

    /**
     * @return array
     */
    public function developmentReportSettings(): array
    {
        return null;
    }

    /**
     * @return array
     */
    public function branchSettings(): array
    {
        return null;
    }

    /**
     * @return string
     */
    public function login(): string
    {
        return null;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return null;
    }
}
