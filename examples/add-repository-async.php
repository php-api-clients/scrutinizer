<?php declare(strict_types=1);

use ApiClients\Client\Scrutinizer\AsyncClient;
use React\EventLoop\Factory;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();
$client = AsyncClient::create($loop, require __DIR__ . DIRECTORY_SEPARATOR . 'resolve_token.php');

$client->github()->addRepository('php-api-clients/scrutinizer')->done(function ($response) {
    var_export($response);
}, function ($error) {
    var_export($error->getResponse());
});

$loop->run();
