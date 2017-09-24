<?php
namespace ApiGateway\Auth;

/**
 * Signature Code
 * 
 * @author    eddycjy <313687982@qq.com>
 * @license   MIT
 */
class Signature
{
	/**
	 * 获取签名
	 * 
	 * @param  string $method 方法
	 * @param  array  $params 请求参数
	 * @param  string $secret 密钥
	 * @return string        
	 */
	public function getSignature($method, $params, $secret)
	{
		ksort($params);
        $canonicalizedQueryString = '';
        foreach($params as $key => $value)
        {
            $canonicalizedQueryString .= '&' . $this->doEncode($key). '=' . $this->doEncode($value);
        }
        
        $stringToSign = $method . '&%2F&' . $this->doEncode(substr($canonicalizedQueryString, 1));

        return $this->doEncode(base64_encode(hash_hmac('sha1', $stringToSign, $secret, true)));
	}

	/**
	 * 对签名进行编码
	 * 
	 * @param  string $code 签名
	 * @return string
	 */
	public function doEncode($code)
	{
		$code = urlencode($code);
        $code = preg_replace('/\+/', '%20', $code);
        $code = preg_replace('/\*/', '%2A', $code);
        $code = preg_replace('/%7E/', '~',  $code);
        return $code;
	}
}