<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Signature\DescribeSignaturesByApi;
use ApiGateway\ApiService;

$object = new DescribeSignaturesByApi();
$object->setGroupId();
$object->setApiId();
$object->setStageName();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);