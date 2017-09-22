<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Control\DescribeTrafficControlsByApi;
use ApiGateway\ApiService;

$object = new DescribeTrafficControlsByApi();
$object->setGroupId();
$object->setApiId();
$object->setStageName();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);