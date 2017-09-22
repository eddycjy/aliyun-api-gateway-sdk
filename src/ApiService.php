<?php
namespace ApiGateway;

use ApiGateway\ApiModel;
use ApiGateway\Config\BaseConfig;
use ApiGateway\Config\ArrayConfig;
use ApiGateway\ClassSerialize;
use ApiGateway\Constants;
use ApiGateway\Auth\Signature;
use ApiGateway\Http\HttpHelper;
use ApiGateway\Exception\ServerException;

class ApiService
{
	use ClassSerialize;

	//请求路径
	protected $url;

	//请求参数
	protected $params;

	public function __construct(ApiModel $modelObject, BaseConfig $configObject = null)
	{
		if($configObject == null)
		{
			$configObject = new ArrayConfig();
		}

		$this->params  = $this->getRequestModelParams($modelObject) + $this->getRequestConfigParams($configObject);

		$this->url = $this->getRequestUrl($configObject->getRegionHost(), $this->params, $configObject->getAccessKeySecret());
	}

	/**
	 * 发起GET请求和解析结果
	 * 
	 * @param  string $format 解析格式
	 * @return json/xml       
	 */
	public function get($format = Constants::JSON_FORMAT)
	{
		$response  = HttpHelper::curl($this->url);
		$body      = $this->parseResponse($response->getBody(), $format);
		if($response->isSuccess() == false)
		{
			throw new ServerException($body['Message'], $body['Code'], $response->getStatus(), $body['RequestId']);
		}

		return $body;
	}

	/**
	 * 执行结果解析
	 * 
	 * @param  json/xml $response 请求结果
	 * @param  string   $format   解析格式
	 * @return json/xml        
	 */
	private function parseResponse($body, $format)
	{
		if ($format == Constants::JSON_FORMAT) 
		{
            $body = json_decode($body, true);
        } 
        else if ($format == Constants::XML_FORMAT) 
        {
            $body = @simplexml_load_string($body);
        }

		return $body;
	}

	/**
	 * 获取请求Model参数
	 * 
	 * @param  object $modelObject Model对象属性
	 * @return array              
	 */
	private function getRequestModelParams($modelObject)
	{
		return $this->toArray($modelObject);
	}

	/**
	 * 获取请求Config参数
	 * 
	 * @param  object $configObject Config对象属性
	 * @return array               
	 */
	private function getRequestConfigParams($configObject)
	{
		return [
			'AccessKeyId' 		=> $configObject->getAccessKeyId(),
			'AccessKeySecret'	=> $configObject->getAccessKeySecret(),
			'Format'			=> $configObject->getFormat(),
			'Version'			=> $configObject->getVersion(),
			'SignatureMethod'   => $configObject->getSignatureMethod(),
			'SignatureVersion'	=> $configObject->getSignatureVersion(),
			'SignatureNonce'	=> $configObject->getSignatureNonce(),
			'Timestamp'		    => $configObject->getTimestamp(),
		];
	}

	/**
	 * 获取请求路径
	 * 
	 * @param  string $host   域名
	 * @param  array  $params 请求参数
	 * @param  string $secret 密钥
	 * @return string         
	 */
	private function getRequestUrl($host, $params, $secret)
	{
		$paramString = "";
        foreach($params as $key => $value)
        {
            $paramString .= urlencode($key) . "=" . urlencode($value) . "&";
        }

        $result =  $host . "/?" . $paramString . "Signature=" . $this->getSignature("GET", $params, $secret . "&");

        return $result;
	}

	/**
	 * 获取签名
	 * 
	 * @param  string $method 方法
	 * @param  array  $params 请求参数
	 * @param  string $secret 密钥
	 * @return string        
	 */
	private function getSignature($method, $params, $secret)
	{
		$object = new Signature();

		return $object->getSignature($method, $params, $secret);
	}

}