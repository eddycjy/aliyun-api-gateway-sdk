<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Api\DescribeApiHistory;
use ApiGateway\ApiService;

$object = new DescribeApiHistory();
$object->setGroupId();
$object->setApiId();
$object->setStageName();
$object->setHistoryVersion();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);