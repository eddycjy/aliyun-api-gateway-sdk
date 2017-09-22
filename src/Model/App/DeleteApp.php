<?php
namespace ApiGateway\Model\App;

use ApiGateway\ApiModel;

class DeleteApp extends ApiModel
{
    public $AppId;

    public function setAppId($id)
    {
        $this->AppId = $id;

        return $this;
    }

}