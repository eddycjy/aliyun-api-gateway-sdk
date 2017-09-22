<?php
namespace ApiGateway\Model\Api;

use ApiGateway\ApiModel;

class DescribeDeployedApis extends ApiModel
{
    public $GroupId;

    public $StageName;

    public $ApiId;

    public $ApiName;

    public $PageSize;

    public $PageNumber;

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

    public function setApiId($id)
    {
        $this->ApiId = $id;

        return $this;
    }

    public function setApiName($name)
    {
        $this->ApiName = $name;

        return $this;
    }

    public function setPageSize($size)
    {
        $this->PageSize = $size;

        return $this;
    }

    public function setPageNumber($number)
    {
        $this->PageNumber = $number;

        return $this;
    }

}