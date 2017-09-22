<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Authorized\DescribeAuthorizedApis;
use ApiGateway\ApiService;

$object = new DescribeAuthorizedApis();
$object->setAppId();
$object->setPageNumber();
$object->setPageSize();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);