<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Authorized\DescribeAuthorizedApps;
use ApiGateway\ApiService;

$object = new DescribeAuthorizedApps();
$object->setGroupId();
$object->setApiId();
$object->setStageName();
$object->setPageNumber();
$object->setPageSize();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);