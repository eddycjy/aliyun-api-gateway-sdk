<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Authorized\RemoveApisAuthorities;
use ApiGateway\ApiService;

$object = new RemoveApisAuthorities();
$object->setGroupId();
$object->setStageName();
$object->setApiIds();
$object->setAppId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);