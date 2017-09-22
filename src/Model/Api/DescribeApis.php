<?php
namespace ApiGateway\Model\Api;

use ApiGateway\ApiModel;

class DescribeApis extends ApiModel
{
    public $GroupId;

    public $ApiId;

    public $ApiName;

    public $CatalogId;

    public $PageSize;

    public $PageNumber;

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

    public function setApiName($name)
    {
        $this->ApiName = $name;

        return $this;
    }

    public function setCatalogId($id)
    {
        $this->CatalogId = $id;

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