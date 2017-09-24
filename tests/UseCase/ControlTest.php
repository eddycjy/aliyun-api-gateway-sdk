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

	public function testCreateApp()
	{
		$createResult = $this->createApp($this->createAppName, $this->createAppDescription);

		$this->assertNotFalse($createResult['check']);

        return $createResult['response']['AppId'];
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
     */
	public function testDeleteTrafficControl($trafficControlId)
	{
		$deleteResult = $this->deleteTrafficControl($trafficControlId);

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
     * @depends testCreateApp
     */
	public function testDeleteApp($appId)
	{
		$deleteResult = $this->deleteApp($appId);

		$this->assertNotFalse($deleteResult['check']);
	}

}