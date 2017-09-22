<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use ApiGateway\Model\Api\CreateApi;
use ApiGateway\ApiService;

$object = new CreateApi();
$object->setGroupId();
$object->setApiName();
$object->setVisibility();
$object->setDescription();
$object->setAuthType();
$object->setOpenIdConnectConfig();
$object->setRequestConfig();
$object->setServiceConfig();
$object->setRequestParameters();
$object->setServiceParameters();
$object->setServiceParametersMap();
$object->setResultType();
$object->setResultSample();
$object->setFailResultSample();
$object->setErrorCodeSamples();

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

print_r($response);