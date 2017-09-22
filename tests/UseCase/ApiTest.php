<?php
use ApiGateway\Constants;

class ApiTest extends BaseTest
{
	private $createGroupName = 'CreateApi';

	private $createDescription = 'CreateApi-Description-UnitTest';

	private $createApiName = 'CreateApiName';

	private $createApiDescription = 'Description';

	private $apiRequestConfig = [
		'RequestProtocol' 		=> Constants::HTTP_PROTOCOL,
		'RequestHttpMethod'		=> Constants::POST_METHOD,
		'RequestPath'			=> '/api/visit/lists',
		'RequestMode'			=> Constants::MAPPING_MODE,
		'BodyFormat'			=> Constants::FORM_BODY_FORMAT,
		'PostBodyDescription'	=> 'CreateApiName-Body-Description',
	];

	private $apiServiceConfig = [
		'ServiceProtocol'		=> Constants::HTTP_PROTOCOL,
		'ServiceAddress'		=> 'http://www.inwill2.com',
		'ServicePath'			=> '/api/visit/lists',
		'ServiceHttpMethod'		=> Constants::POST_METHOD,
		'ServiceTimeout'		=> 50000,
		'ContentTypeCatagory'	=> Constants::DEFAULT_CONTENTTYPE,
		'ContentTypeValue'		=> Constants::FORM_CONTENTTYPE_VALUE,
		'Mock'					=> FALSE,
		'MockResult'			=> '',
		'ServiceVpcEnable'		=> '',
		'VpcConfig'				=> '',	
	];

	private $apiRequestParameters = [
		0 => [
			'ApiParameterName' 	=> 'offset',
			'Location'		   	=> Constants::BODY_LOCATION,
			'ParameterType'	   	=> Constants::STRING_PARAMETERTYPE,
			'Required'		   	=> Constants::REQUIRED_REQUIRED,
			'DefaultValue'	   	=> '',
			'DemoValue'		   	=> '0,10',
			'MaxValue'		   	=> '',
			'MinValue'		   	=> '',
			'MaxLength'		   	=> 100,
			'MinLength'		   	=> 0,
			'RegularExpression' => '',
			'JsonScheme'		=> '',
			'EnumValue'			=> '',
			'DocShow'			=> Constants::PUBLIC_TYPE,
			'DocOrder'			=> 0,
			'Description'		=> '',
		],
	];

	private $apiServiceParameter = [
		0 => [
			'ServiceParameterName'	=> 'offset',
			'Location'				=> Constants::BODY_LOCATION,
			'ParameterType'			=> Constants::STRING_PARAMETERTYPE,
		],
	];

	private $apiServiceParametersMap = [
		0 => [
			'ServiceParameterName' => 'offset',
			'RequestParameterName' => 'offset',
		],
	];

	private $apiResultSample = [];

	private $apiFailResultSample = [];

	private $apiErrorCodeSamples = [
		0 => [
			'Code' 			=> 0,
			'Message' 		=> '',
			'Description'	=> '',
		],
	];

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
	}
}