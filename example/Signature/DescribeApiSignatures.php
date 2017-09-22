<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Signature\DescribeApiSignatures;
use ApiGateway\ApiService;

$object = new DescribeApiSignatures();
$object->setStageName();
$object->setGroupId();
$object->setApiIds();
$object->setPageNumber();
$object->setPageSize();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);