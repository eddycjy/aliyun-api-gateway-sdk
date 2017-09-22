<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\ApiGroup\DescribeApiStage;
use ApiGateway\ApiService;

$object = new DescribeApiStage();
$object->setGroupId('e529ec0b1e7f4001a45abba2a1695ab8');
$object->setStageId('ac6ec340493a49c8afed264f7c80b30d');

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);