<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\ModifyTrafficControl;
use ApiGateway\ApiService;

$object = new ModifyTrafficControl();
$object->setTrafficControlId();
$object->setTrafficControlName();
$object->setTrafficControlUnit();
$object->setApiDefault();
$object->setUserDefault();
$object->setAppDefault();
$object->setDescription();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);