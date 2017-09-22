<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\DeleteTrafficControl;
use ApiGateway\ApiService;

$object = new DeleteTrafficControl();
$object->setTrafficControlId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);