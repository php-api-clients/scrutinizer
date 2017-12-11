<?php declare(strict_types=1);

use ApiClients\Client\Scrutinizer\Client;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$client = Client::create();

$meta = $client->meta();
resource_pretty_print($meta);
