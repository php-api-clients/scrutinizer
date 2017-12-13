<?php

declare(strict_types=1);

namespace ApiClients\Client\Scrutinizer\Middleware;

use ApiClients\Foundation\Middleware\ErrorTrait;
use ApiClients\Foundation\Middleware\MiddlewareInterface;
use ApiClients\Foundation\Middleware\PostTrait;
use Psr\Http\Message\RequestInterface;
use React\Promise\CancellablePromiseInterface;
use function React\Promise\resolve;
use function RingCentral\Psr7\build_query;
use function RingCentral\Psr7\parse_query;

final class AccessTokenMiddleware implements MiddlewareInterface
{
    const OPTION_ACCESS_TOKEN = 'ACCESS_TOKEN';

    use PostTrait;
    use ErrorTrait;

    public function pre(
        RequestInterface $request,
        string $transactionId,
        array $options = []
    ): CancellablePromiseInterface {
        if (!isset($options[self::class][self::OPTION_ACCESS_TOKEN])) {
            return resolve($request);
        }

        $query = parse_query($request->getUri()->getQuery());
        $query['access_token'] = $options[self::class][self::OPTION_ACCESS_TOKEN];
        $request = $request->withUri($request->getUri()->withQuery(build_query($query)));
        return resolve($request);
    }
}