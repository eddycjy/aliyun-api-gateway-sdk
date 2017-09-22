<?php
namespace ApiGateway\Model\Domain;

use ApiGateway\ApiModel;

class ReactivateDomain extends ApiModel
{
    public $GroupId;

    public $DomainName;

    public function setGroupId($id)
    {
        $this->GroupId = $id;

        return $this;
    }

    public function setDomainName($name)
    {
        $this->DomainName = $name;

        return $this;
    }

}