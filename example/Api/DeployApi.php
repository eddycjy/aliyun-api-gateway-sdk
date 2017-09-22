<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Api\DeployApi;
use ApiGateway\ApiService;

$object = new DeployApi();
$object->setGroupId();
$object->setApiId();
$object->setStageName();
$object->setDescription();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);