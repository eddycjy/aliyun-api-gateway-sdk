<?php
namespace ApiGateway\Config;

use ApiGateway\Config\RegionConfig;

/**
 * Array Config
 * 
 * @author    eddycjy <313687982@qq.com>
 * @license   MIT
 */
class ArrayConfig extends RegionConfig
{
	public function __construct(array $config = [])
	{
		$this->init();
		$this->load();
		$this->filter($config);
	}
}