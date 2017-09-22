<?php
namespace ApiGateway\Model\Control;

use ApiGateway\ApiModel;

class RemoveTrafficControlApis extends ApiModel
{
    public $TrafficControlId;

    public $GroupId;

    public $ApiIds;

    public $StageName;

    public function setTrafficControlId($id)
    {
        $this->TrafficControlId = $id;

        return $this;
    }

    public function setGroupId($id)
    {
        $this->GroupId = $id;

        return $this;
    }

    public function setApiIds($ids)
    {
        $this->ApiIds = $ids;

        return $this;
    }

    public function setStageName($name)
    {
        $this->StageName = $name;

        return $this;
    }

}