<?php
namespace ApiGateway\Model\Domain;

use ApiGateway\ApiModel;

class SetDomain extends ApiModel
{
    public $GroupId;

    public $DomainName;

    public $CertificateName;

    public $CertificateBody;

    public $PrivateKey;

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

    public function setCertificateName($name)
    {
        $this->CertificateName = $name;

        return $this;
    }

    public function setCertificateBody($body)
    {
        $this->CertificateBody = $body;

        return $this;
    }

    public function setPrivateKey($key)
    {
        $this->PrivateKey = $key;

        return $this;
    }

}