<?php
namespace ApiGateway\Model\ApiGroup;

use ApiGateway\ApiModel;

class DeleteApiStageVariable extends ApiModel
{
	public $GroupId;

	public $StageId;

	public $VariableName;

	public function setGroupId($id)
	{
		$this->GroupId = $id;

		return $this;
	}

	public function setStageId($id)
	{
		$this->StageId = $id;

		return $this;
	}

	public function setVariableName($name)
	{
		$this->VariableName = $name;

		return $this;
	}
}