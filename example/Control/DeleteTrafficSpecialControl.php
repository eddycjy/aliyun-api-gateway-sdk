<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\DeleteTrafficSpecialControl;
use ApiGateway\ApiService;

$object = new DeleteTrafficSpecialControl();
$object->setTrafficControlId();
$object->setSpecialType();
$object->setSpecialKey();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);