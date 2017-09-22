<?php
namespace ApiGateway\Model\Catalog;

use ApiGateway\ApiModel;

class CreateCatalog extends ApiModel
{
    public $CatalogName;

    public $Description;

    public $ParentId;

    public function setCatalogName($name)
    {
        $this->CatalogName = $name;

        return $this;
    }

    public function setDescription($value)
    {
        $this->Description = $value;

        return $this;
    }

    public function setParentId($id)
    {
        $this->ParentId = $id;

        return $this;
    }

}