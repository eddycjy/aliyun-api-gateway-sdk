<?php
namespace ApiGateway\Config;

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