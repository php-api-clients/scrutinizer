<?php declare(strict_types=1);

use ApiClients\Client\Scrutinizer\AsyncClient;
use ApiClients\Client\Scrutinizer\Resource\RepositoryInterface;
use React\EventLoop\Factory;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();
$client = AsyncClient::create($loop, require __DIR__ . DIRECTORY_SEPARATOR . 'resolve_token.php');

$client->github()->repository('php-api-clients', 'scrutinizer')->done(function (RepositoryInterface $meta) {
    resource_pretty_print($meta);
});

$loop->run();
