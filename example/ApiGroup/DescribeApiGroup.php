<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\ApiGroup\DescribeApiGroup;
use ApiGateway\ApiService;

$object = new DescribeApiGroup();
$object->setGroupId('e529ec0b1e7f4001a45abba2a1695ab8');

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);
