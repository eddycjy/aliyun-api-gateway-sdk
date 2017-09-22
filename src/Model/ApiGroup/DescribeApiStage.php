<?php
namespace ApiGateway\Model\ApiGroup;

use ApiGateway\ApiModel;

class DescribeApiStage extends ApiModel
{
	public $GroupId;

	public $StageId;

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
}
