<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\AddTrafficSpecialControl;
use ApiGateway\ApiService;

$object = new AddTrafficSpecialControl();
$object->setTrafficControlId();
$object->setSpecialType();
$object->setSpecialKey();
$object->setTrafficValue();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);