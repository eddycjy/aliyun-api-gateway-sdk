<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Authorized\SetAppsAuthorities;
use ApiGateway\ApiService;

$object = new SetAppsAuthorities();
$object->setGroupId();
$object->setStageName();
$object->setApiId();
$object->setAppIds();
$object->setDescription();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);