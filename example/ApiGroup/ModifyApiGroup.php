<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\ApiGroup\ModifyApiGroup;
use ApiGateway\ApiService;

$object = new ModifyApiGroup();
$object->setGroupId('e529ec0b1e7f4001a45abba2a1695ab8');
$object->setGroupName('Demo-921');
$object->setDescription('Demo-ModifyApiGroup');

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);
