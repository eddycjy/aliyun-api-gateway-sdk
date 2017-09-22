<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Catalog\DescribeCatalogs;
use ApiGateway\ApiService;

$object = new DescribeCatalogs();
$object->setPageSize();
$object->setPageNumber();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);