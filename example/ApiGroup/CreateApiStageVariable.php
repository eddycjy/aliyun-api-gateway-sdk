<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\ApiGroup\CreateApiStageVariable;
use ApiGateway\ApiService;

$object = new CreateApiStageVariable();
$object->setGroupId('e529ec0b1e7f4001a45abba2a1695ab8');
$object->setStageId('ac6ec340493a49c8afed264f7c80b30d');
$object->setVariableName('Demo');
$object->setVariableValue('Demo');

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);
