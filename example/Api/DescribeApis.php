<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Api\DescribeApis;
use ApiGateway\ApiService;

$object = new DescribeApis();
$object->setGroupId();
$object->setApiId();
$object->setApiName();
$object->setCatalogId();
$object->setPageSize();
$object->setPageNumber();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);