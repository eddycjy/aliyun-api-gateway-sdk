<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Authorized\SetApisAuthorities;
use ApiGateway\ApiService;

$object = new SetApisAuthorities();
$object->setGroupId();
$object->setStageName();
$object->setAppId();
$object->setApiIds();
$object->setDescription();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);