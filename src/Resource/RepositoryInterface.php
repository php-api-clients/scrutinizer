<?php declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Resource;

use ApiClients\Foundation\Resource\ResourceInterface;

interface RepositoryInterface extends ResourceInterface
{
    const HYDRATE_CLASS = 'Repository';

    /**
     * @return string
     */
    public function type(): string;

    /**
     * @return bool
     */
    public function private(): bool;

    /**
     * @return string
     */
    public function defaultBranch(): string;

    /**
     * @return array
     */
    public function applications(): array;

    /**
     * @return array
     */
    public function developmentReportSettings(): array;

    /**
     * @return array
     */
    public function branchSettings(): array;

    /**
     * @return string
     */
    public function login(): string;

    /**
     * @return string
     */
    public function name(): string;
}
