<?php
namespace ApiGateway\Model\App;

use ApiGateway\ApiModel;

class ModifyApp extends ApiModel
{
    public $AppId;

    public $AppName;

    public $Description;

    public function setAppId($id)
    {
        $this->AppId = $id;

        return $this;
    }

    public function setAppName($name)
    {
        $this->AppName = $name;

        return $this;
    }

    public function setDescription($value)
    {
        $this->Description = $value;

        return $this;
    }

}