<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Catalog\ModifyCatalog;
use ApiGateway\ApiService;

$object = new ModifyCatalog();
$object->setCatalogId();
$object->setCatalogName();
$object->setDescription();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);