<?php
namespace ApiGateway\Model\Signature;

use ApiGateway\ApiModel;

class DescribeApisBySignature extends ApiModel
{
    public $SignatureId;

    public $PageSize;

    public $PageNumber;

    public function setSignatureId($id)
    {
        $this->SignatureId = $id;

        return $this;
    }

    public function setPageSize($size)
    {
        $this->PageSize = $size;

        return $this;
    }

    public function setPageNumber($number)
    {
        $this->PageNumber = $number;

        return $this;
    }

}