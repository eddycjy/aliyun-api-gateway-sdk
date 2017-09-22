<?php
namespace ApiGateway\Model\Authorized;

use ApiGateway\ApiModel;

class DescribeAuthorizedApps extends ApiModel
{
    public $GroupId;

    public $ApiId;

    public $StageName;

    public $PageNumber;

    public $PageSize;

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

    public function setPageNumber($number)
    {
        $this->PageNumber = $number;

        return $this;
    }

    public function setPageSize($size)
    {
        $this->PageSize = $size;

        return $this;
    }

}