<?php
namespace ApiGateway\Model\Signature;

use ApiGateway\ApiModel;

class SetSignatureApis extends ApiModel
{
    public $SignatureId;

    public $GroupId;

    public $ApiIds;

    public $StageName;

    public function setSignatureId($id)
    {
        $this->SignatureId = $id;

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

    public function setStageName($name)
    {
        $this->StageName = $name;

        return $this;
    }

}