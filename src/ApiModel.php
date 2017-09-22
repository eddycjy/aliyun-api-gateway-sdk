<?php
namespace ApiGateway;

use ApiGateway\Config\ArrayConfig;

class ApiModel
{
	public $Action;

	public function __construct()
	{
		$currentClassName = $this->getCurrentClassName();

		$this->setAction($currentClassName);
	}

	public function setAction($action)
	{
		$this->Action = $action;

		return $this;
	}

	private function getCurrentClassName()
	{
		$className = get_class($this);
		$className = explode('\\', $className);
		
		return end($className);
	}
}