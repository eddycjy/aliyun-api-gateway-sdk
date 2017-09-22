<?php
namespace ApiGateway\Model\Api;

use ApiGateway\ApiModel;

class DescribeApi extends ApiModel
{
    public $GroupId;

    public $ApiId;

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

}