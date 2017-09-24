<?php

class AppTest extends BaseTest
{
	private $createName = 'CreateApp';

	private $createDescription = 'CreateApp-Description-UnitTest';

	private $modifyName = 'ModifyApp';

	private $modifyDescription = 'ModifyApp-Description-UnitTest';

	public function testCreateApp()
	{
		$createResult = $this->createApp($this->createName, $this->createDescription);

		$this->assertNotFalse($createResult['check']);

        return $createResult['response']['AppId'];
	}

    /**
     * @depends testCreateApp
     */
	public function testModifyApp($appId)
	{
		$modifyResult = $this->modifyApp($appId, $this->modifyName, $this->modifyDescription);

		$this->assertNotFalse($modifyResult['check']);
	}

    /**
     * @depends testCreateApp
     */
	public function testDescribeAppAttributes($appId)
	{
		$listResult = $this->describeAppAttributes($appId, 10, 1);

		$this->assertNotFalse($listResult['check']);
	}

    /**
     * @depends testCreateApp
     */
	public function testDescribeAppSecurity($appId)
	{
		$appInfoResult = $this->describeAppSecurity($appId);

		$this->assertNotFalse($appInfoResult['check']);

		return $appInfoResult['response'];
	}

    /**
     * @depends testDescribeAppSecurity
     */
	public function testResetAppSecret($appInfoResult)
	{
		$resetResult = $this->resetAppSecret($appInfoResult['AppKey']);

		$this->assertNotFalse($resetResult['check']);
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