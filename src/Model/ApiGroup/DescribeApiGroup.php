<?php
namespace ApiGateway\Model\ApiGroup;

use ApiGateway\ApiModel;

class DescribeApiGroup extends ApiModel
{
	public $GroupId;

	public function setGroupId($id)
	{
		$this->GroupId = $id;

		return $this;
	}
}