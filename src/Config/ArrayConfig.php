<?php
namespace ApiGateway\Config;

use ApiGateway\Config\RegionConfig;

class ArrayConfig extends RegionConfig
{
	public function __construct(array $config = [])
	{
		$this->init();
		$this->load();
		$this->filter($config);
	}
}