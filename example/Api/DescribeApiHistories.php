<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Api\DescribeApiHistories;
use ApiGateway\ApiService;

$object = new DescribeApiHistories();
$object->setGroupId();
$object->setApiId();
$object->setApiName();
$object->setStageName();
$object->setPageSize();
$object->setPageNumber();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);