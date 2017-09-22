<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\App\DescribeAppSecurity;
use ApiGateway\ApiService;

$object = new DescribeAppSecurity();
$object->setAppId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);