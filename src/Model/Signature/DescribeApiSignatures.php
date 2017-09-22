<?php
namespace ApiGateway\Model\Signature;

use ApiGateway\ApiModel;

class DescribeApiSignatures extends ApiModel
{
    public $StageName;

    public $GroupId;

    public $ApiIds;

    public $PageNumber;

    public $PageSize;

    public function setStageName($name)
    {
        $this->StageName = $name;

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