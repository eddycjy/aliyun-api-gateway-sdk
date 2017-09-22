<?php
namespace ApiGateway\Model\Control;

use ApiGateway\ApiModel;

class DeleteAllTrafficSpecialControl extends ApiModel
{
    public $TrafficControlId;

    public function setTrafficControlId($id)
    {
        $this->TrafficControlId = $id;

        return $this;
    }

}