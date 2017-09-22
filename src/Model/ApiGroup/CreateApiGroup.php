<?php
namespace ApiGateway\Model\ApiGroup;

use ApiGateway\ApiModel;

class CreateApiGroup extends ApiModel
{
	public $GroupName;

	public $Description;

	public function setGroupName($name)
	{
		$this->GroupName = $name;

		return $this;
	}

	public function setDescription($description)
	{
		$this->Description = $description;

		return $this;
	}
}