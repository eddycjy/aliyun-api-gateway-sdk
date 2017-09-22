<?php
namespace ApiGateway\Model\Control;

use ApiGateway\ApiModel;

class AddTrafficSpecialControl extends ApiModel
{
    public $TrafficControlId;

    public $SpecialType;

    public $SpecialKey;

    public $TrafficValue;

    public function setTrafficControlId($id)
    {
        $this->TrafficControlId = $id;

        return $this;
    }

    public function setSpecialType($type)
    {
        $this->SpecialType = $type;

        return $this;
    }

    public function setSpecialKey($key)
    {
        $this->SpecialKey = $key;

        return $this;
    }

    public function setTrafficValue($value)
    {
        $this->TrafficValue = $value;

        return $this;
    }

}