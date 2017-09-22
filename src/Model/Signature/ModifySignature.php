<?php
namespace ApiGateway\Model\Signature;

use ApiGateway\ApiModel;

class ModifySignature extends ApiModel
{
    public $SignatureId;

    public $SignatureName;

    public $SignatureKey;

    public $SignatureSecret;

    public function setSignatureId($id)
    {
        $this->SignatureId = $id;

        return $this;
    }

    public function setSignatureName($name)
    {
        $this->SignatureName = $name;

        return $this;
    }

    public function setSignatureKey($key)
    {
        $this->SignatureKey = $key;

        return $this;
    }

    public function setSignatureSecret($secret)
    {
        $this->SignatureSecret = $secret;

        return $this;
    }

}