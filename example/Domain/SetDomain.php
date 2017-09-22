<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Domain\SetDomain;
use ApiGateway\ApiService;

$object = new SetDomain();
$object->setGroupId();
$object->setDomainName();
$object->setCertificateName();
$object->setCertificateBody();
$object->setPrivateKey();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);