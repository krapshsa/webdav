<?php

use App\FakeLockersPlugin;
use Sabre\DAV;

require_once 'vendor/autoload.php';

$rootDirectory = new DAV\FS\Directory('public');
$server        = new DAV\Server($rootDirectory);

$server->setBaseUri('/index.php/');

$server->addPlugin(new FakeLockersPlugin());

$server->addPlugin(new DAV\Browser\Plugin());
$server->start();


