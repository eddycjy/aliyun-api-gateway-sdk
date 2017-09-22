<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Catalog\DeleteCatalog;
use ApiGateway\ApiService;

$object = new DeleteCatalog();
$object->setCatalogId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);