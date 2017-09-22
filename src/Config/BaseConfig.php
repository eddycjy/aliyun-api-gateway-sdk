<?php
namespace ApiGateway\Config;

use ApiGateway\Config\ConfigInterface;
use ApiGateway\Constants;

abstract class BaseConfig implements ConfigInterface
{	
	public $AccessKeyId;

	public $AccessKeySecret;

	public $Format;

	public $Version;

	public $SignatureMethod;

	public $SignatureVersion; 

	public $SignatureNonce;

	public $Timestamp;

	public function init()
	{
		$this->Timestamp = gmdate($this->getDateFormat());
		$this->SignatureNonce = md5(uniqid(mt_rand(), true));
	}

	public function getDateFormat()
	{
		return 'Y-m-d\TH:i:s\Z';
	}

	public function getAccessKeyId()
	{
		return $this->AccessKeyId;
	}

	public function getAccessKeySecret()
	{
		return $this->AccessKeySecret;
	}

	public function getFormat()
	{
		return $this->Format;
	}

	public function getVersion()
	{
		return $this->Version;
	}

	public function getSignatureMethod()
	{
		return $this->SignatureMethod;
	}

	public function getSignatureVersion()
	{
		return $this->SignatureVersion;
	}

	public function getSignatureNonce()
	{
		return $this->SignatureNonce;
	}

	public function getTimestamp()
	{
		return $this->Timestamp;
	}
	
	/**
	 * 加载并填充配置项
	 * 
	 * @return boolean
	 */
	protected function load()
	{
		$filePath =  __DIR__ . Constants::DS . '..' . Constants::DS . 'Env.php';
		if(is_file($filePath))
		{
			$envConfig = include $filePath;
			if(! empty($envConfig))
			{
				$this->filter($envConfig);
			}
		}

		return true;
	}

	/**
	 * 填充配置项
	 * 
	 * @param  array $config  配置参数
	 * @return boolean
	 */
	protected function filter($config)
	{
		foreach ($config as $key => $value)
		{
			if(property_exists($this, $key))
			{
				$this->$key = $value;
			}
		}

		return true;
	}
}