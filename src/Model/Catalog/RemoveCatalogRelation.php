<?php
namespace ApiGateway\Model\Catalog;

use ApiGateway\ApiModel;

class RemoveCatalogRelation extends ApiModel
{
    public $CatalogId;

    public $ApiId;

    public function setCatalogId($id)
    {
        $this->CatalogId = $id;

        return $this;
    }

    public function setApiId($id)
    {
        $this->ApiId = $id;

        return $this;
    }

}