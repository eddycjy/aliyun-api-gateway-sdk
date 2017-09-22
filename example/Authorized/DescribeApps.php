<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Authorized\DescribeApps;
use ApiGateway\ApiService;

$object = new DescribeApps();
$object->setAppId();
$object->setAppOwner();
$object->setPageSize();
$object->setPageNumber();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);