<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Api\DescribeApi;
use ApiGateway\ApiService;

$object = new DescribeApi();
$object->setGroupId();
$object->setApiId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);