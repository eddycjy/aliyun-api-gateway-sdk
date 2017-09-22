<?php
namespace ApiGateway\Model\ApiGroup;

use ApiGateway\ApiModel;

class ModifyApiGroup extends ApiModel
{
	public $GroupId;

	public $GroupName;

	public $Description;

	public function setGroupId($id)
	{
		$this->GroupId = $id;

		return $this;
	}

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