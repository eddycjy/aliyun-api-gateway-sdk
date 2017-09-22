<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Authorized\RemoveAppsAuthorities;
use ApiGateway\ApiService;

$object = new RemoveAppsAuthorities();
$object->setGroupId();
$object->setStageName();
$object->setApiId();
$object->setAppIds();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);