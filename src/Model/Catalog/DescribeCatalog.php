<?php
namespace ApiGateway\Model\Catalog;

use ApiGateway\ApiModel;

class DescribeCatalog extends ApiModel
{
    public $CatalogId;

    public function setCatalogId($id)
    {
        $this->CatalogId = $id;

        return $this;
    }

}