<?php
namespace ApiGateway\Model\App;

use ApiGateway\ApiModel;

class DescribeAppSecurity extends ApiModel
{
    public $AppId;

    public function setAppId($id)
    {
        $this->AppId = $id;

        return $this;
    }

}