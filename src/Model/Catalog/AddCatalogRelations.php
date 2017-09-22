<?php
namespace ApiGateway\Model\Catalog;

use ApiGateway\ApiModel;

class AddCatalogRelations extends ApiModel
{
    public $CatalogId;

    public $ApiIds;

    public function setCatalogId($id)
    {
        $this->CatalogId = $id;

        return $this;
    }

    public function setApiIds($ids)
    {
        $this->ApiIds = $ids;

        return $this;
    }

}