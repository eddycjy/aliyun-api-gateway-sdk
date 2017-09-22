<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Catalog\DescribeCatalog;
use ApiGateway\ApiService;

$object = new DescribeCatalog();
$object->setCatalogId();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);