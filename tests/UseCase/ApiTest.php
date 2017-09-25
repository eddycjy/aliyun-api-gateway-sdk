<?php
use ApiGateway\Constants;

class ApiTest extends BaseTest
{
	private $createGroupName = 'CreateApi';

	private $createDescription = 'CreateApi-Description-UnitTest';

	private $createApiName = 'CreateApiName';

	private $createApiDescription = 'Description';

	private $modifyApiName = 'ModifyApiName';

	private $modifyApiDescription = 'ModifyDescription';

	private $deployStageName = Constants::TEST_STAGE;

	private $deployDescriptionStep1 = 'DeployDescription-Step1';

	private $deployDescriptionStep2 = 'DeployDescription-Step2';

	private $switchDescriptionStep3 = 'SwitchDescription-Step3';


	public function testCreateApiGroup()
	{
		$createResult = $this->createApiGroup($this->createGroupName, $this->createDescription);

        $this->assertNotFalse($createResult['check']);

        return $createResult['response']['GroupId'];
	}

    /**
     * @depends testCreateApiGroup
     */
	public function testCreateApi($groupId)
	{
		$params = [
			'GroupId' 				=> $groupId,
			'ApiName' 				=> $this->createApiName,
			'Visibility' 			=> Constants::PUBLIC_TYPE,
			'Description'			=> $this->createApiDescription,
			'AuthType'				=> Constants::APP_AUTH,
			'OpenIdConnectConfig'	=> '',
			'RequestConfig'			=> json_encode($this->apiRequestConfig),
			'ServiceConfig'			=> json_encode($this->apiServiceConfig),
			'RequestParameters'		=> json_encode($this->apiRequestParameters),
			'ServiceParameters'		=> json_encode($this->apiServiceParameter),
			'ServiceParametersMap'	=> json_encode($this->apiServiceParametersMap),
			'ResultType'			=> Constants::JSON_FORMAT,
			'ResultSample'			=> json_encode($this->apiResultSample),
			'FailResultSample'		=> json_encode($this->apiFailResultSample),
			'ErrorCodeSamples'		=> json_encode($this->apiErrorCodeSamples),
		];

		$apiResult = $this->createApi($params);

		$this->assertNotFalse($apiResult['check']);

		return $apiResult['response']['ApiId'];
	}

    /**
     * @depends testCreateApiGroup
     * @depends testCreateApi
     */
	public function testModifyApi($groupId, $apiId)
	{
		$params = [
			'GroupId' 				=> $groupId,
			'ApiId'					=> $apiId,
			'ApiName' 				=> $this->modifyApiName,
			'Visibility' 			=> Constants::PUBLIC_TYPE,
			'Description'			=> $this->modifyApiDescription,
			'AuthType'				=> Constants::APP_AUTH,
			'OpenIdConnectConfig'	=> '',
			'RequestConfig'			=> json_encode($this->apiRequestConfig),
			'ServiceConfig'			=> json_encode($this->apiServiceConfig),
			'RequestParameters'		=> json_encode($this->apiRequestParameters),
			'ServiceParameters'		=> json_encode($this->apiServiceParameter),
			'ServiceParametersMap'	=> json_encode($this->apiServiceParametersMap),
			'ResultType'			=> Constants::JSON_FORMAT,
			'ResultSample'			=> json_encode($this->apiResultSample),
			'FailResultSample'		=> json_encode($this->apiFailResultSample),
			'ErrorCodeSamples'		=> json_encode($this->apiErrorCodeSamples),
		];

		$apiResult = $this->modifyApi($params);

		$this->assertNotFalse($apiResult['check']);
	}

    /**
     * @depends testCreateApiGroup
     * @depends testCreateApi
     */
	public function testDeployApiStep1($groupId, $apiId)
	{
		$apiResult = $this->deployApi($groupId, $apiId, $this->deployStageName, $this->deployDescriptionStep1);

		$this->assertNotFalse($apiResult['check']);
	}

    /**
     * @depends testCreateApiGroup
     * @depends testCreateApi
     */
	public function testDeployApiStep2($groupId, $apiId)
	{
		$apiResult = $this->deployApi($groupId, $apiId, $this->deployStageName, $this->deployDescriptionStep2);

		$this->assertNotFalse($apiResult['check']);
	}

    /**
     * @depends testCreateApiGroup
     */
	public function testDescribeApiHistories($groupId)
	{
		$params = [
			'GroupId'    => $groupId,
			'ApiId'	     => '',
			'ApiName'    => '',
			'StageName'  => $this->deployStageName,
			'PageSize'   => '10',
			'PageNumber' => '1',
		];

		$apiResult = $this->describeApiHistories($params);

		$this->assertNotFalse($apiResult['check']);

		return $apiResult['response']['ApiHisItems']['ApiHisItem'];
	}

	/**
     * @depends testCreateApiGroup
     * @depends testCreateApi
     * @depends testDescribeApiHistories
     */
	public function testSwitchApi($groupId, $apiId, $apiHisItem)
	{
		$params = [
			'GroupId' 			=> $groupId,
			'ApiId'	  			=> $apiId,
			'StageName'			=> $this->deployStageName,
			'HistoryVersion'	=> $apiHisItem[0]['HistoryVersion'],
			'Description'		=> $this->switchDescriptionStep3,
		];
		
		$apiResult = $this->switchApi($params);

		$this->assertNotFalse($apiResult['check']);
	}

    /**
     * @depends testCreateApiGroup
     * @depends testCreateApi
     */
	public function testDescribeApi($groupId, $apiId)
	{
		$apiResult = $this->describeApi($groupId, $apiId);

		$this->assertNotFalse($apiResult['check']);
	}

    /**
     * @depends testCreateApiGroup
     * @depends testCreateApi
     */
	public function testDescribeApiDoc($groupId, $apiId)
	{
		$apiResult = $this->describeApiDoc($groupId, $apiId, $this->deployStageName);

		$this->assertNotFalse($apiResult['check']);
	}

	/**
     * @depends testCreateApiGroup
     */
	public function testDescribeApis($groupId)
	{
		$params = [
			'GroupId' 	 => $groupId,
			'ApiId'   	 => '',
			'ApiName' 	 => '',
			'CatalogId'  => '',
			'PageSize'	 => 10,
			'PageNumber' => 1,
		];

		$apiResult = $this->describeApis($params);

		$this->assertNotFalse($apiResult['check']);
	}

    /**
     * @depends testCreateApiGroup
     * @depends testCreateApi
     */
	public function testAbolishApi($groupId, $apiId)
	{
		$apiResult = $this->abolishApi($groupId, $apiId, $this->deployStageName);

		$this->assertNotFalse($apiResult['check']);
	}

    /**
     * @depends testCreateApiGroup
     * @depends testCreateApi
     */
	public function testDeleteApi($groupId, $apiId)
	{
		$apiResult = $this->deleteApi($groupId, $apiId);

		$this->assertNotFalse($apiResult['check']);
	}

	/**
     * @depends testCreateApiGroup
     */
	public function testDeleteApiGroup($groupId)
	{
		$groupResult = $this->deleteApiGroup($groupId);

		$this->assertNotFalse($groupResult['check']);
	}

}