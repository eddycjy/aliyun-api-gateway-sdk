<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\CreateTrafficControl;
use ApiGateway\ApiService;

$object = new CreateTrafficControl();
$object->setTrafficControlName();
$object->setTrafficControlUnit();
$object->setApiDefault();
$object->setUserDefault();
$object->setAppDefault();
$object->setDescription();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);