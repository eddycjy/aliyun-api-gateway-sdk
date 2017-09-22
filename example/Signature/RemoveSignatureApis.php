<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Signature\RemoveSignatureApis;
use ApiGateway\ApiService;

$object = new RemoveSignatureApis();
$object->setSignatureId();
$object->setGroupId();
$object->setApiIds();
$object->setStageName();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);