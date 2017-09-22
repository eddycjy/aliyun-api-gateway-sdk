<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\DescribeApisByTrafficControl;
use ApiGateway\ApiService;

$object = new DescribeApisByTrafficControl();
$object->setTrafficControlId();
$object->setPageSize();
$object->setPageNumber();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);