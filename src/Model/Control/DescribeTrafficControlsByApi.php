<?php
namespace ApiGateway\Model\Control;

use ApiGateway\ApiModel;

class DescribeTrafficControlsByApi extends ApiModel
{
    public $GroupId;

    public $ApiId;

    public $StageName;

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

}