<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Scrutinizer;

use ApiClients\Client\Scrutinizer\Middleware\AccessTokenMiddleware;
use ApiClients\Tools\TestUtilities\TestCase;
use React\EventLoop\Factory;
use RingCentral\Psr7\Request;

final class AccessTokenMiddlewareTest extends TestCase
{
    public function testNoOption()
    {
        $request = new Request('GET', 'https://example.com/');

        $middleware = new AccessTokenMiddleware();
        $returnedRequest = $this->await($middleware->pre($request, 'abc'), Factory::create());

        self::assertSame($request, $returnedRequest);
    }

    public function testAddedTokenFirst()
    {
        $request = new Request('GET', 'https://example.com/');

        $middleware = new AccessTokenMiddleware();
        $promise = $middleware->pre(
            $request,
            'abc',
            [
                AccessTokenMiddleware::class => [
                    AccessTokenMiddleware::OPTION_ACCESS_TOKEN => 'token',
                ],
            ]
        );
        $returnedRequest = $this->await($promise, Factory::create());

        self::assertNotSame($request, $returnedRequest);
        self::assertSame('https://example.com/?access_token=token', (string)$returnedRequest->getUri());
    }

    public function testAddedTokenSecond()
    {
        $request = new Request('GET', 'https://example.com/?first=value');

        $middleware = new AccessTokenMiddleware();
        $promise = $middleware->pre(
            $request,
            'abc',
            [
                AccessTokenMiddleware::class => [
                    AccessTokenMiddleware::OPTION_ACCESS_TOKEN => 'token',
                ],
            ]
        );
        $returnedRequest = $this->await($promise, Factory::create());

        self::assertNotSame($request, $returnedRequest);
        self::assertSame('https://example.com/?first=value&access_token=token', (string)$returnedRequest->getUri());
    }
}
