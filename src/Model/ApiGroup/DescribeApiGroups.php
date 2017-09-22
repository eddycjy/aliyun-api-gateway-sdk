<?php
namespace ApiGateway\Model\ApiGroup;

use ApiGateway\ApiModel;

class DescribeApiGroups extends ApiModel
{
	public $GroupId;

	public $GroupName;

	public $PageNumber;

	public $PageSize;

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

	public function setPageNumber($number)
	{
		$this->PageNumber = $number;

		return $this;
	}

	public function setPageSize($size)
	{
		$this->PageSize = $size;

		return $this;
	}

}