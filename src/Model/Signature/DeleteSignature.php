<?php
namespace ApiGateway\Model\Signature;

use ApiGateway\ApiModel;

class DeleteSignature extends ApiModel
{
    public $SignatureId;

    public function setSignatureId($id)
    {
        $this->SignatureId = $id;

        return $this;
    }

}