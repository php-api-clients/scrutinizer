<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer;

use ApiClients\Client\Scrutinizer\Middleware\AccessTokenMiddleware;
use ApiClients\Foundation\Hydrator\Options as HydratorOptions;
use ApiClients\Foundation\Options as FoundationOptions;
use ApiClients\Foundation\Transport\Options as TransportOptions;
use ApiClients\Middleware\HttpExceptions\HttpExceptionsMiddleware;
use ApiClients\Middleware\Json\JsonDecodeMiddleware;
use ApiClients\Middleware\Json\JsonEncodeMiddleware;
use ApiClients\Middleware\UserAgent\Options as UserAgentMiddlewareOptions;
use ApiClients\Middleware\UserAgent\UserAgentMiddleware;
use ApiClients\Middleware\UserAgent\UserAgentStrategies;
use function ApiClients\Foundation\options_merge;

final class ApiSettings
{
    const NAMESPACE = 'ApiClients\\Client\\Scrutinizer\\Resource';
    const TRANSPORT_OPTIONS = [
        FoundationOptions::HYDRATOR_OPTIONS => [
            HydratorOptions::NAMESPACE => self::NAMESPACE,
            HydratorOptions::NAMESPACE_DIR => __DIR__ . DIRECTORY_SEPARATOR . 'Resource' . DIRECTORY_SEPARATOR,
        ],
        FoundationOptions::TRANSPORT_OPTIONS => [
            TransportOptions::HOST => 'scrutinizer-ci.com',
            TransportOptions::PATH => '/api/',
            TransportOptions::MIDDLEWARE => [
                HttpExceptionsMiddleware::class,
                UserAgentMiddleware::class,
                JsonDecodeMiddleware::class,
                JsonEncodeMiddleware::class,
                AccessTokenMiddleware::class,
            ],
            TransportOptions::DEFAULT_REQUEST_OPTIONS => [
                UserAgentMiddleware::class => [
                    UserAgentMiddlewareOptions::STRATEGY => UserAgentStrategies::PACKAGE_VERSION,
                    UserAgentMiddlewareOptions::PACKAGE => 'api-clients/scrutinizer',
                ],
            ],
        ],
    ];

    public static function getOptions(string $token, array $suppliedOptions, string $suffix): array
    {
        $options = options_merge(self::TRANSPORT_OPTIONS, $suppliedOptions);
        $options[FoundationOptions::HYDRATOR_OPTIONS][HydratorOptions::NAMESPACE_SUFFIX] = $suffix;

        $dro = $options[FoundationOptions::TRANSPORT_OPTIONS][TransportOptions::DEFAULT_REQUEST_OPTIONS];
        $dro[AccessTokenMiddleware::class] = [
            AccessTokenMiddleware::OPTION_ACCESS_TOKEN => $token,
        ];
        $options[FoundationOptions::TRANSPORT_OPTIONS][TransportOptions::DEFAULT_REQUEST_OPTIONS] = $dro;

        return $options;
    }
}
