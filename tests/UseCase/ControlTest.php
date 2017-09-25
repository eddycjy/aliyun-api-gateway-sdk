<?php
use ApiGateway\Constants;

class ControlTest extends BaseTest
{
	private $createControlName = 'CreateControl';

	private $createControlUnit = Constants::MINUTE_UNIT;

	private $createDescription = 'Create-Description-UnitTest';

	private $modifyControlName = 'ModifyControl';

	private $modifyControlUnit = Constants::HOUR_UNIT;

	private $modifyDescription = 'Modify-Description-UnitTest';

	private $specialType = Constants::APP_SPECIALTYPE;

	private $createAppName = 'CreateControl';

	private $createAppDescription = 'CreateControl-Description-UnitTest';

	private $createStageName = Constants::TEST_STAGE;

	public function testCreateTrafficControl()
	{
		$params = [
			'TrafficControlName' => $this->createControlName,
			'TrafficControlUnit' => $this->createControlUnit,
			'ApiDefault'         => 10000,
			'UserDefault'		 => 10000,
			'AppDefault'		 => 10000,
			'Description'		 => $this->createDescription,
		];

		$createResult = $this->createTrafficControl($params);

		$this->assertNotFalse($createResult['check']);

		return $createResult['response']['TrafficControlId'];
	}

	/**
     * @depends testCreateTrafficControl
     */
	public function testModifyTrafficControl($trafficControlId)
	{
		$params = [
			'TrafficControlId'	 => $trafficControlId,
			'TrafficControlName' => $this->modifyControlName,
			'TrafficControlUnit' => $this->modifyControlUnit,
			'ApiDefault'         => 20000,
			'UserDefault'		 => 20000,
			'AppDefault'		 => 20000,
			'Description'		 => $this->modifyDescription,
		];

		$modifyResult = $this->modifyTrafficControl($params);

		$this->assertNotFalse($modifyResult['check']);
	}

	public function testCreateApiGroup()
    {
        $createResult = $this->createApiGroup($this->createControlName, $this->createDescription);

        $this->assertNotFalse($createResult['check']);

        return $createResult['response']['GroupId'];
    }

	public function testCreateApp()
	{
		$createResult = $this->createApp($this->createAppName, $this->createAppDescription);

		$this->assertNotFalse($createResult['check']);

        return $createResult['response']['AppId'];
	}

	/**
     * @depends testCreateApiGroup
     */
    public function testCreateApi($groupId)
	{
		$params = [
			'GroupId' 				=> $groupId,
			'ApiName' 				=> $this->createControlName,
			'Visibility' 			=> Constants::PUBLIC_TYPE,
			'Description'			=> $this->createDescription,
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
	public function testDeployApiStep1($groupId, $apiId)
	{
		$apiResult = $this->deployApi($groupId, $apiId, $this->createStageName, $this->createAppDescription);

		$this->assertNotFalse($apiResult['check']);
	}

	/**
	 * @depends testCreateTrafficControl
	 * @depends testCreateApiGroup
	 * @depends testCreateApi
	 */
	public function testSetTrafficControlApis($trafficControlId, $groupId, $apiId)
	{
		$apiResult = $this->setTrafficControlApis($trafficControlId, $groupId, $apiId, $this->createStageName);

		$this->assertNotFalse($apiResult['check']);
	}

	/**
	 * @depends testCreateTrafficControl
	 * @depends testCreateApiGroup
	 * @depends testCreateApi
	 */
	public function testRemoveTrafficControlApis($trafficControlId, $groupId, $apiId)
	{
		$apiResult = $this->removeTrafficControlApis($trafficControlId, $groupId, $apiId, $this->createStageName);

		$this->assertNotFalse($apiResult['check']);
	}

	/**
     * @depends testCreateTrafficControl
     * @depends testCreateApp
     */
	public function testAddTrafficSpecialControl($trafficControlId, $appId)
	{
		$addResult = $this->addTrafficSpecialControl($trafficControlId, $this->specialType, $appId, 10000);

		$this->assertNotFalse($addResult['check']);
	}

	/**
     * @depends testCreateTrafficControl
     */
	public function testDeleteAllTrafficSpecialControl($trafficControlId)
	{
		$deleteResult = $this->deleteAllTrafficSpecialControl($trafficControlId);

		$this->assertNotFalse($deleteResult['check']);
	}

	/**
     * @depends testCreateTrafficControl
     * @depends testCreateApp
     */
	public function testDeleteTrafficSpecialControl($trafficControlId, $appId)
	{
		$deleteResult = $this->deleteTrafficSpecialControl($trafficControlId, $this->specialType, $appId);

		$this->assertNotFalse($deleteResult['check']);
	}

	/**
     * @depends testCreateTrafficControl
     */
	public function testDeleteTrafficControl($trafficControlId)
	{
		$deleteResult = $this->deleteTrafficControl($trafficControlId);

		$this->assertNotFalse($deleteResult['check']);
	}

	/**
     * @depends testCreateApiGroup
     * @depends testCreateApi
     */
	public function testAbolishApi($groupId, $apiId)
	{
		$apiResult = $this->abolishApi($groupId, $apiId, $this->createStageName);

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

	/**
     * @depends testCreateApp
     */
	public function testDeleteApp($appId)
	{
		$deleteResult = $this->deleteApp($appId);

		$this->assertNotFalse($deleteResult['check']);
	}

}