<?php declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Resource;

use ApiClients\Foundation\Hydrator\Annotation\EmptyResource;
use ApiClients\Foundation\Resource\AbstractResource;

/**
 * @EmptyResource("EmptyRepository")
 */
abstract class Repository extends AbstractResource implements RepositoryInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var bool
     */
    protected $private;

    /**
     * @var string
     */
    protected $default_branch;

    /**
     * @var array
     */
    protected $applications;

    /**
     * @var array
     */
    protected $development_report_settings;

    /**
     * @var array
     */
    protected $branch_settings;

    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function private(): bool
    {
        return $this->private;
    }

    /**
     * @return string
     */
    public function defaultBranch(): string
    {
        return $this->default_branch;
    }

    /**
     * @return array
     */
    public function applications(): array
    {
        return $this->applications;
    }

    /**
     * @return array
     */
    public function developmentReportSettings(): array
    {
        return $this->development_report_settings;
    }

    /**
     * @return array
     */
    public function branchSettings(): array
    {
        return $this->branch_settings;
    }

    /**
     * @return string
     */
    public function login(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
}
