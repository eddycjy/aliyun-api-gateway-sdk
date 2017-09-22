<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Other\DescribeRegions;
use ApiGateway\ApiService;

$object = new DescribeRegions();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);