<?php
namespace ApiGateway\Model\Authorized;

use ApiGateway\ApiModel;

class DescribeApps extends ApiModel
{
    public $AppId;

    public $AppOwner;

    public $PageSize;

    public $PageNumber;

    public function setAppId($id)
    {
        $this->AppId = $id;

        return $this;
    }

    public function setAppOwner($owner)
    {
        $this->AppOwner = $owner;

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