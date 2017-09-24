# Aliyun Api Gateway SDK

[![Latest Stable Version](https://poser.pugx.org/EDDYCJY/aliyun-api-gateway-sdk/v/stable)](https://packagist.org/packages/eddycjy/aliyun-api-gateway-sdk)
[![License](https://poser.pugx.org/EDDYCJY/aliyun-api-gateway-sdk/license)](https://packagist.org/packages/eddycjy/aliyun-api-gateway-sdk)
[![Total Downloads](https://poser.pugx.org/EDDYCJY/aliyun-api-gateway-sdk/downloads)](https://packagist.org/packages/eddycjy/aliyun-api-gateway-sdk)

# Requirements

- PHP >= 5.4.0

# Installation

``` sh
composer require eddycjy/aliyun-api-gateway-sdk
```

# Configuration

## Use File

Copy Env.example.php file to Env.php

``` php
return [
    'AccessKeyId'       => '',
    'AccessKeySecret'   => '',
    'Format'            => 'json',
    'Version'           => '2016-07-14',
    'SignatureMethod'   => 'HMAC-SHA1',
    'SignatureVersion'  => '1.0'
];
```

## Use Array
``` php
use ApiGateway\Config\ArrayConfig;
use ApiGateway\Model\ApiGroup\CreateApiGroup;
use ApiGateway\ApiService;

$config = new ArrayConfig([
    'AccessKeyId'       => '',
    'AccessKeySecret'   => '',
    'Format'            => 'json',
    'Version'           => '2016-07-14',
    'SignatureMethod'   => 'HMAC-SHA1',
    'SignatureVersion'  => '1.0'
]);

$model = new CreateApiGroup();
$model->setGroupName('Demo');
$model->setDescription('Demo-CreateApiGroup');

$serviceObj = new ApiService($model, $config);
$response   = $serviceObj->get();

```

# Usage

[Please see the example directory](https://github.com/EDDYCJY/aliyun-api-gateway-sdk/tree/master/example)


# Gen

## Generate Model and Example:

```
# Python 3.x
python gen.py
```

``` sh
Please input class name: CreateApi
Please input class group: Api
Please input class property-key: GroupId
Please input class property-params: id

# input q to quit
Please input class property-key: q

```    

- Model Code: 

``` php
namespace ApiGateway\Model\Api;

use ApiGateway\ApiModel;

class CreateApi extends ApiModel
{
    public $GroupId;

    public function setGroupId($id)
    {
        $this->GroupId = $id;

        return $this;
    }

    ...

```

- Example Code: 

``` php
use ApiGateway\Model\Api\CreateApi;
use ApiGateway\ApiService;

$object = new CreateApi();
$object->setGroupId($demo);
...

$serviceObj = new ApiService($object);
$response   = $serviceObj->get();

```