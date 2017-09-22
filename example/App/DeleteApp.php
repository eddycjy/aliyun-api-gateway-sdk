<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\App\DeleteApp;
use ApiGateway\ApiService;

$object = new DeleteApp();
$object->setAppId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);