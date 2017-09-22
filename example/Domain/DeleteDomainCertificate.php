<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Domain\DeleteDomainCertificate;
use ApiGateway\ApiService;

$object = new DeleteDomainCertificate();
$object->setGroupId();
$object->setDomainName();
$object->setCertificateId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);