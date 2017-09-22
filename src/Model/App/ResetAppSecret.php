<?php
namespace ApiGateway\Model\App;

use ApiGateway\ApiModel;

class ResetAppSecret extends ApiModel
{
    public $AppKey;

    public function setAppKey($key)
    {
        $this->AppKey = $key;

        return $this;
    }

}