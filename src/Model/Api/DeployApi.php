<?php
namespace ApiGateway\Model\Api;

use ApiGateway\ApiModel;

class DeployApi extends ApiModel
{
    public $GroupId;

    public $ApiId;

    public $StageName;

    public $Description;

    public function setGroupId($id)
    {
        $this->GroupId = $id;

        return $this;
    }

    public function setApiId($id)
    {
        $this->ApiId = $id;

        return $this;
    }

    public function setStageName($name)
    {
        $this->StageName = $name;

        return $this;
    }

    public function setDescription($value)
    {
        $this->Description = $value;

        return $this;
    }

}