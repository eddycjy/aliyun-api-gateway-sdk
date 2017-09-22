<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Api\DescribeDeployedApis;
use ApiGateway\ApiService;

$object = new DescribeDeployedApis();
$object->setGroupId();
$object->setStageName();
$object->setApiId();
$object->setApiName();
$object->setPageSize();
$object->setPageNumber();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);