<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Signature\SetSignatureApis;
use ApiGateway\ApiService;

$object = new SetSignatureApis();
$object->setSignatureId();
$object->setGroupId();
$object->setApiIds();
$object->setStageName();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);