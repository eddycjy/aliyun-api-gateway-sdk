<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Catalog\RemoveCatalogRelation;
use ApiGateway\ApiService;

$object = new RemoveCatalogRelation();
$object->setCatalogId();
$object->setApiId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);