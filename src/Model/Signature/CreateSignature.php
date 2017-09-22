<?php
namespace ApiGateway\Model\Signature;

use ApiGateway\ApiModel;

class CreateSignature extends ApiModel
{
    public $SignatureName;

    public $SignatureKey;

    public $SignatureSecret;

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