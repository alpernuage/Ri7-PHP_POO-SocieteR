<?php
require __DIR__ . '/../vendor/autoload.php';

use App\App;

use Symfony\Component\HttpFoundation\Request;

$response = (new App())->run(Request::createFromGlobals());
$response->send();
