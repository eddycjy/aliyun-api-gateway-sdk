<?php
namespace ApiGateway\Auth;

class ShaHmac1
{
    public function signString($code, $secret)
    {
        return base64_encode(hash_hmac('sha1', $code, $secret, true));
    }
    
    public function getSignatureMethod()
    {
        return 'HMAC-SHA1';
    }

    public function getSignatureVersion()
    {
        return '1.0';
    }
}
