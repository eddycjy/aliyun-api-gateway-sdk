<?php
namespace ApiGateway;

use ApiGateway\Config\ArrayConfig;

/**
 * Api Model
 * 
 * @author    eddycjy <313687982@qq.com>
 * @license   MIT
 */
class ApiModel
{
	//请求接口的对应方法
	public $Action;

	public function __construct()
	{
		$currentClassName = $this->getCurrentClassName();

		$this->setAction($currentClassName);
	}

	/**
	 * 设置Action
	 * 
	 * @param string $action 对应方法
	 */
	public function setAction($action)
	{
		$this->Action = $action;

		return $this;
	}

	/**
	 * 获取当前类的根类名
	 * 
	 * @return string 根类名
	 */
	private function getCurrentClassName()
	{
		$className = get_class($this);
		$className = explode('\\', $className);
		
		return end($className);
	}
}