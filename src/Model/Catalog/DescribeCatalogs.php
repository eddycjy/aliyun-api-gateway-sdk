<?php
namespace ApiGateway\Model\Catalog;

use ApiGateway\ApiModel;

class DescribeCatalogs extends ApiModel
{
    public $PageSize;

    public $PageNumber;

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