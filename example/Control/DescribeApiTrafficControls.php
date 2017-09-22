<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\DescribeApiTrafficControls;
use ApiGateway\ApiService;

$object = new DescribeApiTrafficControls();
$object->setStageName();
$object->setGroupId();
$object->setApiIds();
$object->setPageNumber();
$object->setPageSize();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);