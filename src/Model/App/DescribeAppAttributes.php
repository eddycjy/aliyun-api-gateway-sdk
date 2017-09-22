<?php
namespace ApiGateway\Model\App;

use ApiGateway\ApiModel;

class DescribeAppAttributes extends ApiModel
{
    public $AppId;

    public $PageSize;

    public $PageNumber;

    public function setAppId($id)
    {
        $this->AppId = $id;

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