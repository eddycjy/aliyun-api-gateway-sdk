<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Api\DeleteApi;
use ApiGateway\ApiService;

$object = new DeleteApi();
$object->setGroupId();
$object->setApiId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);