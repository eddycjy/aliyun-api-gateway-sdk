<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\DescribeTrafficControls;
use ApiGateway\ApiService;

$object = new DescribeTrafficControls();
$object->setTrafficControlId();
$object->setGroupId();
$object->setApiId();
$object->setStageName();
$object->setTrafficControlName();
$object->setPageSize();
$object->setPageNumber();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);