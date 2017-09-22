<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\App\ModifyApp;
use ApiGateway\ApiService;

$object = new ModifyApp();
$object->setAppId();
$object->setAppName();
$object->setDescription();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);