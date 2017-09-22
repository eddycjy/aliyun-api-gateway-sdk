<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\DeleteAllTrafficSpecialControl;
use ApiGateway\ApiService;

$object = new DeleteAllTrafficSpecialControl();
$object->setTrafficControlId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);