<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Catalog\CreateCatalog;
use ApiGateway\ApiService;

$object = new CreateCatalog();
$object->setCatalogName();
$object->setDescription();
$object->setParentId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);