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

	private $specialKey = '12345';

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
     */
	// public function testAddTrafficSpecialControl($trafficControlId)
	// {
	// 	$addResult = $this->addTrafficSpecialControl($trafficControlId, $this->specialType, $this->specialKey, 10000);

	// 	$this->assertNotFalse($addResult['check']);
	// }

}