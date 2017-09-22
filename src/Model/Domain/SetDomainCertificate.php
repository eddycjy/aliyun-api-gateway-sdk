<?php
namespace ApiGateway\Model\Domain;

use ApiGateway\ApiModel;

class SetDomainCertificate extends ApiModel
{
    public $GroupId;

    public $DomainName;

    public $CertificateName;

    public $CertificateBody;

    public $CertificatePrivateKey;

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

    public function setCertificatePrivateKey($key)
    {
        $this->CertificatePrivateKey = $key;

        return $this;
    }

}