<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\RemoveTrafficControlApis;
use ApiGateway\ApiService;

$object = new RemoveTrafficControlApis();
$object->setTrafficControlId();
$object->setGroupId();
$object->setApiIds();
$object->setStageName();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);