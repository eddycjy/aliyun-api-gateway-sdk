<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Signature\CreateSignature;
use ApiGateway\ApiService;

$object = new CreateSignature();
$object->setSignatureName();
$object->setSignatureKey();
$object->setSignatureSecret();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);