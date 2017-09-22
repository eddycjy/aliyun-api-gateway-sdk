<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Domain\SetDomainCertificate;
use ApiGateway\ApiService;

$object = new SetDomainCertificate();
$object->setGroupId();
$object->setDomainName();
$object->setCertificateName();
$object->setCertificateBody();
$object->setCertificatePrivateKey();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);