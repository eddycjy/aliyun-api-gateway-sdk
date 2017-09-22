<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Signature\DeleteSignature;
use ApiGateway\ApiService;

$object = new DeleteSignature();
$object->setSignatureId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);