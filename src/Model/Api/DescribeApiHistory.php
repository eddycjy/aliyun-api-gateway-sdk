<?php
namespace ApiGateway\Model\Api;

use ApiGateway\ApiModel;

class DescribeApiHistory extends ApiModel
{
    public $GroupId;

    public $ApiId;

    public $StageName;

    public $HistoryVersion;

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

    public function setHistoryVersion($version)
    {
        $this->HistoryVersion = $version;

        return $this;
    }

}