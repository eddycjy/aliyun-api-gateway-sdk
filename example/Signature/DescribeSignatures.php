<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Signature\DescribeSignatures;
use ApiGateway\ApiService;

$object = new DescribeSignatures();
$object->setSignatureId();
$object->setSignatureName();
$object->setPageNumber();
$object->setPageSize();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);