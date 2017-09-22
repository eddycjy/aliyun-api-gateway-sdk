<?php
namespace ApiGateway\Model\Authorized;

use ApiGateway\ApiModel;

class DescribeAuthorizedApis extends ApiModel
{
    public $AppId;

    public $PageNumber;

    public $PageSize;

    public function setAppId($id)
    {
        $this->AppId = $id;

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