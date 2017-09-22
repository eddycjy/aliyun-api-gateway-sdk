<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Signature\DescribeApisBySignature;
use ApiGateway\ApiService;

$object = new DescribeApisBySignature();
$object->setSignatureId();
$object->setPageSize();
$object->setPageNumber();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);