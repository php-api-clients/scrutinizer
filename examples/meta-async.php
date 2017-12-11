<?php declare(strict_types=1);

use ApiClients\Client\Scrutinizer\AsyncClient;
use ApiClients\Client\Scrutinizer\Resource\MetaInterface;
use React\EventLoop\Factory;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();
$client = AsyncClient::create($loop);

$client->meta()->done(function (MetaInterface $meta) {
    resource_pretty_print($meta);
});

$loop->run();
