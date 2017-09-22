<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\App\ResetAppSecret;
use ApiGateway\ApiService;

$object = new ResetAppSecret();
$object->setAppKey();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);