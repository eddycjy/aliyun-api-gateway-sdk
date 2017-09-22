<?php
namespace ApiGateway\Model\Control;

use ApiGateway\ApiModel;

class DescribeApisByTrafficControl extends ApiModel
{
    public $TrafficControlId;

    public $PageSize;

    public $PageNumber;

    public function setTrafficControlId($id)
    {
        $this->TrafficControlId = $id;

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