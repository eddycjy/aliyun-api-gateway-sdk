<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\SetTrafficControlApis;
use ApiGateway\ApiService;

$object = new SetTrafficControlApis();
$object->setTrafficControlId();
$object->setGroupId();
$object->setApiIds();
$object->setStageName();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);