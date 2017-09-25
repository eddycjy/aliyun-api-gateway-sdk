<?php
use ApiGateway\Constants;

class AuthorizedTest extends BaseTest
{
	private $createName = 'CreateAuthorized';

	private $createDescription = 'CreateAuthorized-Description-UnitTest';

	private $createApiName = 'CreateApiAuthorized';

	private $createApiDescription = 'AuthorizedDescription';

	private $authorizedStageName = Constants::TEST_STAGE;

	public function testCreateApiGroup()
    {
        $createResult = $this->createApiGroup($this->createName, $this->createDescription);

        $this->assertNotFalse($createResult['check']);

        return $createResult['response']['GroupId'];
    }

    public function testCreateApp()
	{
		$createResult = $this->createApp($this->createName, $this->createDescription);

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
	 * @depends testCreateApp
	 * @depends testCreateApi
	 */
	public function testSetApisAuthorities($groupId, $appId, $apiId)
	{
		$params = [
			'GroupId' 		=> $groupId,
			'StageName'		=> $this->authorizedStageName,
			'AppId'			=> $appId,
			'ApiIds'		=> $apiId,
			'Description'	=> $this->createApiDescription,
		];

		$authorResult = $this->setApisAuthorities($params);

		$this->assertNotFalse($authorResult['check']);
	}

	/**
	 * @depends testCreateApiGroup
	 * @depends testCreateApp
	 * @depends testCreateApi
	 */
	public function testRemoveApisAuthorities($groupId, $appId, $apiId)
	{
		$params = [
			'GroupId' 		=> $groupId,
			'StageName'		=> $this->authorizedStageName,
			'AppId'			=> $appId,
			'ApiIds'		=> $apiId,
		];

		$authorResult = $this->removeApisAuthorities($params);

		$this->assertNotFalse($authorResult['check']);
	}

	/**
	 * @depends testCreateApiGroup
	 * @depends testCreateApp
	 * @depends testCreateApi
	 */
	public function testSetAppsAuthorities($groupId, $appId, $apiId)
	{
		$params = [
			'GroupId' 		=> $groupId,
			'StageName'		=> $this->authorizedStageName,
			'ApiId'			=> $apiId,
			'AppIds'		=> $appId,
			'Description'	=> $this->createApiDescription,
		];
		
		$authorResult = $this->setAppsAuthorities($params);

		$this->assertNotFalse($authorResult['check']);
	}

	/**
	 * @depends testCreateApiGroup
	 * @depends testCreateApp
	 * @depends testCreateApi
	 */
	public function testRemoveAppsAuthorities($groupId, $appId, $apiId)
	{
		$params = [
			'GroupId' 		=> $groupId,
			'StageName'		=> $this->authorizedStageName,
			'ApiId'			=> $apiId,
			'AppIds'		=> $appId,
		];

		$authorResult = $this->removeAppsAuthorities($params);

		$this->assertNotFalse($authorResult['check']);
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