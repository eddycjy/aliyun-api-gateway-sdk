<?php
namespace ApiGateway\Model\Authorized;

use ApiGateway\ApiModel;

class SetApisAuthorities extends ApiModel
{
    public $GroupId;

    public $StageName;

    public $AppId;

    public $ApiIds;

    public $Description;

    public function setGroupId($id)
    {
        $this->GroupId = $id;

        return $this;
    }

    public function setStageName($name)
    {
        $this->StageName = $name;

        return $this;
    }

    public function setAppId($id)
    {
        $this->AppId = $id;

        return $this;
    }

    public function setApiIds($ids)
    {
        $this->ApiIds = $ids;

        return $this;
    }

    public function setDescription($value)
    {
        $this->Description = $value;

        return $this;
    }

}