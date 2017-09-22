<?php
namespace ApiGateway\Model\Control;

use ApiGateway\ApiModel;

class DeleteTrafficControl extends ApiModel
{
    public $TrafficControlId;

    public function setTrafficControlId($id)
    {
        $this->TrafficControlId = $id;

        return $this;
    }

}