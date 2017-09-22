<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\ApiGroup\CreateApiGroup;
use ApiGateway\ApiService;

$object = new CreateApiGroup();
$object->setGroupName('Demo');
$object->setDescription('Demo-CreateApiGroup');

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);
