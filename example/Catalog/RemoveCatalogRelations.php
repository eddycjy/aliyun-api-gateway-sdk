<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Catalog\RemoveCatalogRelations;
use ApiGateway\ApiService;

$object = new RemoveCatalogRelations();
$object->setCatalogId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);