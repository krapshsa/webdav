<?php

use App\FakeLockersPlugin;
use Sabre\DAV;

require_once 'vendor/autoload.php';

ini_set('output_buffering', 'off');
ini_set('max_execution_time', '300');

$rootDirectory = new DAV\FS\Directory('public');
$server        = new DAV\Server($rootDirectory);

$server->setBaseUri('/index.php/');

$server->addPlugin(new FakeLockersPlugin());

$server->addPlugin(new DAV\Browser\Plugin());

try {
    $server->start();
} catch (\Exception $e) {
    file_put_contents('kevin.log', $e->getMessage(), FILE_APPEND);
    throw $e;
}


