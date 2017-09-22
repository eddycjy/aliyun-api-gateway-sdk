<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Domain\ReactivateDomain;
use ApiGateway\ApiService;

$object = new ReactivateDomain();
$object->setGroupId();
$object->setDomainName();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);