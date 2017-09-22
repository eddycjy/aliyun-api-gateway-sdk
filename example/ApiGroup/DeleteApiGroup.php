<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\ApiGroup\DeleteApiGroup;
use ApiGateway\ApiService;

$object = new DeleteApiGroup();
$object->setGroupId('39d6d32ed2654d52aefda8724d3e06a8');

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);
