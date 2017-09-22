<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\App\DescribeAppAttributes;
use ApiGateway\ApiService;

$object = new DescribeAppAttributes();
$object->setAppId();
$object->setPageSize();
$object->setPageNumber();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);