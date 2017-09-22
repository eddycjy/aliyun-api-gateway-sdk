<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Other\DescribeSystemParameters;
use ApiGateway\ApiService;

$object = new DescribeSystemParameters();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);