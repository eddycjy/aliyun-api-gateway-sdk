<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\ApiGroup\DescribeApiGroups;
use ApiGateway\ApiService;

$object = new DescribeApiGroups();
$object->setGroupId();
$object->setGroupName();
$object->setPageNumber();
$object->setPageSize();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);
