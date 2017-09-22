<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\ApiGroup\DeleteApiStageVariable;
use ApiGateway\ApiService;

$object = new DeleteApiStageVariable();
$object->setGroupId('e529ec0b1e7f4001a45abba2a1695ab8');
$object->setStageId('6ef60bec-0242-43af-bb20-270359fb54a7');
$object->setVariableName('Demo');

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);
