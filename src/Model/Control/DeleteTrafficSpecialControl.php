<?php
namespace ApiGateway\Model\Control;

use ApiGateway\ApiModel;

class DeleteTrafficSpecialControl extends ApiModel
{
    public $TrafficControlId;

    public $SpecialType;

    public $SpecialKey;

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

}