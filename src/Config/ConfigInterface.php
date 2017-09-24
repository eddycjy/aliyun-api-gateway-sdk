<?php
namespace ApiGateway\Config;

/**
 * Config Interface
 * 
 * @author    eddycjy <313687982@qq.com>
 * @license   MIT
 */
interface ConfigInterface
{
	public function getRegionNode();

	public function getRegionHost();

	public function getAccessKeyId();

	public function getAccessKeySecret();

	public function getFormat();

	public function getVersion();

	public function getSignatureMethod();

	public function getSignatureVersion();
}