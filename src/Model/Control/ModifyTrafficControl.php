<?php
namespace ApiGateway\Model\Control;

use ApiGateway\ApiModel;

class ModifyTrafficControl extends ApiModel
{
    public $TrafficControlId;

    public $TrafficControlName;

    public $TrafficControlUnit;

    public $ApiDefault;

    public $UserDefault;

    public $AppDefault;

    public $Description;

    public function setTrafficControlId($id)
    {
        $this->TrafficControlId = $id;

        return $this;
    }

    public function setTrafficControlName($name)
    {
        $this->TrafficControlName = $name;

        return $this;
    }

    public function setTrafficControlUnit($unit)
    {
        $this->TrafficControlUnit = $unit;

        return $this;
    }

    public function setApiDefault($value)
    {
        $this->ApiDefault = $value;

        return $this;
    }

    public function setUserDefault($value)
    {
        $this->UserDefault = $value;

        return $this;
    }

    public function setAppDefault($value)
    {
        $this->AppDefault = $value;

        return $this;
    }

    public function setDescription($value)
    {
        $this->Description = $value;

        return $this;
    }

}