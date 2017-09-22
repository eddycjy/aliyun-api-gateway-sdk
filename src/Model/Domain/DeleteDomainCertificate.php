<?php
namespace ApiGateway\Model\Domain;

use ApiGateway\ApiModel;

class DeleteDomainCertificate extends ApiModel
{
    public $GroupId;

    public $DomainName;

    public $CertificateId;

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

    public function setCertificateId($id)
    {
        $this->CertificateId = $id;

        return $this;
    }

}