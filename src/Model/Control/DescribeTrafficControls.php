<?php
namespace ApiGateway\Model\Control;

use ApiGateway\ApiModel;

class DescribeTrafficControls extends ApiModel
{
    public $TrafficControlId;

    public $GroupId;

    public $ApiId;

    public $StageName;

    public $TrafficControlName;

    public $PageSize;

    public $PageNumber;

    public function setTrafficControlId($id)
    {
        $this->TrafficControlId = $id;

        return $this;
    }

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

    public function setTrafficControlName($name)
    {
        $this->TrafficControlName = $name;

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