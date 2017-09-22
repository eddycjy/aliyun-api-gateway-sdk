<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Catalog\ClearCatalogRelations;
use ApiGateway\ApiService;

$object = new ClearCatalogRelations();
$object->setCatalogId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);