<?php
namespace ApiGateway\Model\Signature;

use ApiGateway\ApiModel;

class DescribeSignaturesByApi extends ApiModel
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