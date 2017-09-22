<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Api\SwitchApi;
use ApiGateway\ApiService;

$object = new SwitchApi();
$object->setGroupId();
$object->setApiId();
$object->setStageName();
$object->setHistoryVersion();
$object->setDescription();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);