<?php
namespace ApiGateway\Model\App;

use ApiGateway\ApiModel;

class CreateApp extends ApiModel
{
    public $AppName;

    public $Description;

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