<?php
namespace ApiGateway\Model\Signature;

use ApiGateway\ApiModel;

class DescribeSignatures extends ApiModel
{
    public $SignatureId;

    public $SignatureName;

    public $PageNumber;

    public $PageSize;

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

    public function setPageNumber($number)
    {
        $this->PageNumber = $number;

        return $this;
    }

    public function setPageSize($size)
    {
        $this->PageSize = $size;

        return $this;
    }

}