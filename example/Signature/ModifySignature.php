<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Signature\ModifySignature;
use ApiGateway\ApiService;

$object = new ModifySignature();
$object->setSignatureId();
$object->setSignatureName();
$object->setSignatureKey();
$object->setSignatureSecret();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);