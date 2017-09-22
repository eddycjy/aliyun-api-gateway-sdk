<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\App\CreateApp;
use ApiGateway\ApiService;

$object = new CreateApp();
$object->setAppName();
$object->setDescription();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);