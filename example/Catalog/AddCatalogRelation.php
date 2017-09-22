<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Catalog\AddCatalogRelation;
use ApiGateway\ApiService;

$object = new AddCatalogRelation();
$object->setCatalogId();
$object->setApiId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);