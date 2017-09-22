<?php
namespace ApiGateway\Model\Api;

use ApiGateway\ApiModel;

class ModifyApi extends ApiModel
{
    public $GroupId;

    public $ApiId;

    public $ApiName;

    public $Visibility;

    public $Description;

    public $AuthType;

    public $OpenIdConnectConfig;

    public $RequestConfig;

    public $ServiceConfig;

    public $RequestParameters;

    public $ServiceParameters;

    public $ServiceParametersMap;

    public $ResultType;

    public $ResultSample;

    public $FailResultSample;

    public $ErrorCodeSamples;

    public function setGroupId($id)
    {
        $this->GroupId = $id;

        return $this;
    }

    public function setApiId($id)
    {
        $this->ApiId = $id;

        return $this;
    }

    public function setApiName($name)
    {
        $this->ApiName = $name;

        return $this;
    }

    public function setVisibility($value)
    {
        $this->Visibility = $value;

        return $this;
    }

    public function setDescription($value)
    {
        $this->Description = $value;

        return $this;
    }

    public function setAuthType($type)
    {
        $this->AuthType = $type;

        return $this;
    }

    public function setOpenIdConnectConfig($value)
    {
        $this->OpenIdConnectConfig = $value;

        return $this;
    }

    public function setRequestConfig($value)
    {
        $this->RequestConfig = $value;

        return $this;
    }

    public function setServiceConfig($value)
    {
        $this->ServiceConfig = $value;

        return $this;
    }

    public function setRequestParameters($value)
    {
        $this->RequestParameters = $value;

        return $this;
    }

    public function setServiceParameters($value)
    {
        $this->ServiceParameters = $value;

        return $this;
    }

    public function setServiceParametersMap($value)
    {
        $this->ServiceParametersMap = $value;

        return $this;
    }

    public function setResultType($type)
    {
        $this->ResultType = $type;

        return $this;
    }

    public function setResultSample($value)
    {
        $this->ResultSample = $value;

        return $this;
    }

    public function setFailResultSample($value)
    {
        $this->FailResultSample = $value;

        return $this;
    }

    public function setErrorCodeSamples($value)
    {
        $this->ErrorCodeSamples = $value;

        return $this;
    }

}