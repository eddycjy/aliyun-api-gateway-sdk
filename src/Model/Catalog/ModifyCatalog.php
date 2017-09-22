<?php
namespace ApiGateway\Model\Catalog;

use ApiGateway\ApiModel;

class ModifyCatalog extends ApiModel
{
    public $CatalogId;

    public $CatalogName;

    public $Description;

    public function setCatalogId($id)
    {
        $this->CatalogId = $id;

        return $this;
    }

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

}