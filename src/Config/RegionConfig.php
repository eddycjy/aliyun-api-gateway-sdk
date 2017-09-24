<?php
namespace ApiGateway\Config;

use ApiGateway\Config\BaseConfig;

/**
 * Region Config
 * 
 * @author    eddycjy <313687982@qq.com>
 * @license   MIT
 */
class RegionConfig extends BaseConfig
{
	public $RegionNode = 'cn-hangzhou';

	public $RegionHost = 'http://apigateway.%s.aliyuncs.com';

	public function getRegionNode()
	{
		return $this->RegionNode;
	}

	public function getRegionHost()
	{
		return sprintf($this->RegionHost, $this->RegionNode);
	}

}