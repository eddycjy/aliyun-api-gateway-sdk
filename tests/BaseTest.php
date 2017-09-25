<?php
use PHPUnit\Framework\TestCase;

use ApiGateway\Model\ApiGroup\CreateApiGroup;
use ApiGateway\Model\ApiGroup\ModifyApiGroup;
use ApiGateway\Model\ApiGroup\DeleteApiGroup;
use ApiGateway\Model\ApiGroup\DescribeApiGroup;
use ApiGateway\Model\ApiGroup\DescribeApiGroups;
use ApiGateway\Model\ApiGroup\CreateApiStageVariable;
use ApiGateway\Model\ApiGroup\DeleteApiStageVariable;
use ApiGateway\Model\ApiGroup\DescribeApiStage;

use ApiGateway\Model\Api\CreateApi;
use ApiGateway\Model\Api\ModifyApi;
use ApiGateway\Model\Api\DeployApi;
use ApiGateway\Model\Api\DescribeApiHistories;
use ApiGateway\Model\Api\SwitchApi;
use ApiGateway\Model\Api\AbolishApi;
use ApiGateway\Model\Api\DeleteApi;
use ApiGateway\Model\Api\DescribeApi;
use ApiGateway\Model\Api\DescribeApiDoc;
use ApiGateway\Model\Api\DescribeApis;

use ApiGateway\Model\Control\CreateTrafficControl;
use ApiGateway\Model\Control\ModifyTrafficControl;
use ApiGateway\Model\Control\DeleteTrafficControl;
use ApiGateway\Model\Control\AddTrafficSpecialControl;
use ApiGateway\Model\Control\DeleteAllTrafficSpecialControl;
use ApiGateway\Model\Control\DeleteTrafficSpecialControl;
use ApiGateway\Model\Control\SetTrafficControlApis;
use ApiGateway\Model\Control\RemoveTrafficControlApis;

use ApiGateway\Model\App\CreateApp;
use ApiGateway\Model\App\ModifyApp;
use ApiGateway\Model\App\DescribeAppAttributes;
use ApiGateway\Model\App\DescribeAppSecurity;
use ApiGateway\Model\App\ResetAppSecret;
use ApiGateway\Model\App\DeleteApp;

use ApiGateway\Model\Authorized\SetApisAuthorities;
use ApiGateway\Model\Authorized\RemoveApisAuthorities;
use ApiGateway\Model\Authorized\SetAppsAuthorities;

use ApiGateway\ApiService;

class BaseTest extends TestCase
{
    protected $apiRequestConfig = [
        'RequestProtocol'       => Constants::HTTP_PROTOCOL,
        'RequestHttpMethod'     => Constants::POST_METHOD,
        'RequestPath'           => '/api/visit/lists',
        'RequestMode'           => Constants::MAPPING_MODE,
        'BodyFormat'            => Constants::FORM_BODY_FORMAT,
        'PostBodyDescription'   => 'CreateApiName-Body-Description',
    ];

    protected $apiServiceConfig = [
        'ServiceProtocol'       => Constants::HTTP_PROTOCOL,
        'ServiceAddress'        => 'http://www.inwill2.com',
        'ServicePath'           => '/api/visit/lists',
        'ServiceHttpMethod'     => Constants::POST_METHOD,
        'ServiceTimeout'        => 50000,
        'ContentTypeCatagory'   => Constants::DEFAULT_CONTENTTYPE,
        'ContentTypeValue'      => Constants::FORM_CONTENTTYPE_VALUE,
        'Mock'                  => FALSE,
        'MockResult'            => '',
        'ServiceVpcEnable'      => '',
        'VpcConfig'             => '',  
    ];

    protected $apiRequestParameters = [
        0 => [
            'ApiParameterName'  => 'offset',
            'Location'          => Constants::BODY_LOCATION,
            'ParameterType'     => Constants::STRING_PARAMETERTYPE,
            'Required'          => Constants::REQUIRED_REQUIRED,
            'DefaultValue'      => '',
            'DemoValue'         => '0,10',
            'MaxValue'          => '',
            'MinValue'          => '',
            'MaxLength'         => 100,
            'MinLength'         => 0,
            'RegularExpression' => '',
            'JsonScheme'        => '',
            'EnumValue'         => '',
            'DocShow'           => Constants::PUBLIC_TYPE,
            'DocOrder'          => 0,
            'Description'       => '',
        ],
    ];

    protected $apiServiceParameter = [
        0 => [
            'ServiceParameterName'  => 'offset',
            'Location'              => Constants::BODY_LOCATION,
            'ParameterType'         => Constants::STRING_PARAMETERTYPE,
        ],
    ];

    private $apiServiceParametersMap = [
        0 => [
            'ServiceParameterName' => 'offset',
            'RequestParameterName' => 'offset',
        ],
    ];

    protected $apiResultSample = [];

    protected $apiFailResultSample = [];

    protected $apiErrorCodeSamples = [
        0 => [
            'Code'          => 0,
            'Message'       => '',
            'Description'   => '',
        ],
    ];

	/* Api Group Start */

	protected function createApiGroup($createGroupName, $createDescription)
    {
        $object = new CreateApiGroup();
        $object->setGroupName($createGroupName);
        $object->setDescription($createDescription);

        $serviceObj  = new ApiService($object);
        $response    = $serviceObj->get();

        $checks = [
            'GroupId',
            'GroupName'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function modifyApiGroup($groupId, $modifyGroupName, $modifyDescription)
    {
        $object = new ModifyApiGroup();
        $object->setGroupId($groupId);
        $object->setGroupName($modifyGroupName);
        $object->setDescription($modifyDescription);

        $serviceObj  = new ApiService($object);
        $response    = $serviceObj->get();

        $checks = [
            'GroupId',
            'GroupName'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function deleteApiGroup($groupId)
    {
        $object = new DeleteApiGroup();
        $object->setGroupId($groupId);

        $serviceObj  = new ApiService($object);
        $response    = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function describeApiGroup($groupId)
    {
    	$object = new DescribeApiGroup();
		$object->setGroupId($groupId);

		$serviceObj = new ApiService($object);
		$response   = $serviceObj->get();

        $checks = [
            'GroupId',
            'GroupName'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function describeApiGroups($groupId, $groupName, $pageNumber, $pageSize)
    {
    	$object = new DescribeApiGroups();
		$object->setGroupId($groupId);
		$object->setGroupName($groupName);
		$object->setPageNumber($pageNumber);
		$object->setPageSize($pageSize);

		$serviceObj = new ApiService($object);
		$response   = $serviceObj->get();

        $checks = [
            'TotalCount',
            'ApiGroupAttributes'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function createApiStageVariable($groupId, $stageId, $varName, $varValue)
    {
    	$object = new CreateApiStageVariable();
		$object->setGroupId($groupId);
		$object->setStageId($stageId);
		$object->setVariableName($varName);
		$object->setVariableValue($varValue);

		$serviceObj = new ApiService($object);
		$response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function deleteApiStageVariable($groupId, $stageId, $varName)
    {
    	$object = new DeleteApiStageVariable();
		$object->setGroupId($groupId);
		$object->setStageId($stageId);
		$object->setVariableName($varName);

		$serviceObj = new ApiService($object);
		$response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function describeApiStage($groupId, $stageId)
    {
    	$object = new DescribeApiStage();
		$object->setGroupId($groupId);
		$object->setStageId($stageId);

		$serviceObj = new ApiService($object);
		$response   = $serviceObj->get();

        $checks = [
            'GroupId',
            'StageName'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }


    /* Api Group End */


    /* Api Start */

    protected function createApi($params)
    {
        $object = new CreateApi();
        $object->setGroupId($params['GroupId']);
        $object->setApiName($params['ApiName']);
        $object->setVisibility($params['Visibility']);
        $object->setDescription($params['Description']);
        $object->setAuthType($params['AuthType']);
        $object->setOpenIdConnectConfig($params['OpenIdConnectConfig']);
        $object->setRequestConfig($params['RequestConfig']);
        $object->setServiceConfig($params['ServiceConfig']);
        $object->setRequestParameters($params['RequestParameters']);
        $object->setServiceParameters($params['ServiceParameters']);
        $object->setServiceParametersMap($params['ServiceParametersMap']);
        $object->setResultType($params['ResultType']);
        $object->setResultSample($params['ResultSample']);
        $object->setFailResultSample($params['FailResultSample']);
        $object->setErrorCodeSamples($params['ErrorCodeSamples']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
            'ApiId'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function modifyApi($params)
    {
        $object = new ModifyApi();
        $object->setGroupId($params['GroupId']);
        $object->setApiId($params['ApiId']);
        $object->setApiName($params['ApiName']);
        $object->setVisibility($params['Visibility']);
        $object->setDescription($params['Description']);
        $object->setAuthType($params['AuthType']);
        $object->setOpenIdConnectConfig($params['OpenIdConnectConfig']);
        $object->setRequestConfig($params['RequestConfig']);
        $object->setServiceConfig($params['ServiceConfig']);
        $object->setRequestParameters($params['RequestParameters']);
        $object->setServiceParameters($params['ServiceParameters']);
        $object->setServiceParametersMap($params['ServiceParametersMap']);
        $object->setResultType($params['ResultType']);
        $object->setResultSample($params['ResultSample']);
        $object->setFailResultSample($params['FailResultSample']);
        $object->setErrorCodeSamples($params['ErrorCodeSamples']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function deployApi($groupId, $apiId, $stageName, $description)
    {
        $object = new DeployApi();
        $object->setGroupId($groupId);
        $object->setApiId($apiId);
        $object->setStageName($stageName);
        $object->setDescription($description);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function describeApiHistories($params)
    {
        $object = new DescribeApiHistories();
        $object->setGroupId($params['GroupId']);
        $object->setApiId($params['ApiId']);
        $object->setApiName($params['ApiName']);
        $object->setStageName($params['StageName']);
        $object->setPageSize($params['PageSize']);
        $object->setPageNumber($params['PageNumber']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'TotalCount',
            'PageNumber',
            'PageSize',
            'ApiHisItems'
        ];


        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function switchApi($params)
    {
        $object = new SwitchApi();
        $object->setGroupId($params['GroupId']);
        $object->setApiId($params['ApiId']);
        $object->setStageName($params['StageName']);
        $object->setHistoryVersion($params['HistoryVersion']);
        $object->setDescription($params['Description']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function abolishApi($groupId, $apiId, $stageName)
    {
        $object = new AbolishApi();
        $object->setGroupId($groupId);
        $object->setApiId($apiId);
        $object->setStageName($stageName);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function deleteApi($groupId, $apiId)
    {
        $object = new DeleteApi();
        $object->setGroupId($groupId);
        $object->setApiId($apiId);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function describeApi($groupId, $apiId)
    {
        $object = new DescribeApi();
        $object->setGroupId($groupId);
        $object->setApiId($apiId);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
            'RegionId',
            'ApiId',
            'ApiName',
            'GroupId',
            'GroupName'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function describeApiDoc($groupId, $apiId, $stageName)
    {
        $object = new DescribeApiDoc();
        $object->setGroupId($groupId);
        $object->setApiId($apiId);
        $object->setStageName($stageName);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
            'RegionId',
            'ApiId',
            'ApiName',
            'GroupId',
            'GroupName',
            'StageName',
            'ApiId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function describeApis($params)
    {
        $object = new DescribeApis();
        $object->setGroupId($params['GroupId']);
        $object->setApiId($params['ApiId']);
        $object->setApiName($params['ApiName']);
        $object->setCatalogId($params['CatalogId']);
        $object->setPageSize($params['PageSize']);
        $object->setPageNumber($params['PageNumber']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
            'TotalCount',
            'PageNumber',
            'PageSize',
            'ApiSummarys',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    /* Api End */

    /* Control Start */

    protected function createTrafficControl($params)
    {
        $object = new CreateTrafficControl();
        $object->setTrafficControlName($params['TrafficControlName']);
        $object->setTrafficControlUnit($params['TrafficControlUnit']);
        $object->setApiDefault($params['ApiDefault']);
        $object->setUserDefault($params['UserDefault']);
        $object->setAppDefault($params['AppDefault']);
        $object->setDescription($params['Description']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
            'TrafficControlId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function modifyTrafficControl($params)
    {
        $object = new ModifyTrafficControl();
        $object->setTrafficControlId($params['TrafficControlId']);
        $object->setTrafficControlName($params['TrafficControlName']);
        $object->setTrafficControlUnit($params['TrafficControlUnit']);
        $object->setApiDefault($params['ApiDefault']);
        $object->setUserDefault($params['UserDefault']);
        $object->setAppDefault($params['AppDefault']);
        $object->setDescription($params['Description']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function deleteTrafficControl($trafficControlId)
    {
        $object = new DeleteTrafficControl();
        $object->setTrafficControlId($trafficControlId);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function addTrafficSpecialControl($trafficControlId, $specialType, $specialKey, $trafficValue)
    {
        $object = new AddTrafficSpecialControl();
        $object->setTrafficControlId($trafficControlId);
        $object->setSpecialType($specialType);
        $object->setSpecialKey($specialKey);
        $object->setTrafficValue($trafficValue);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function deleteAllTrafficSpecialControl($trafficControlId)
    {
        $object = new DeleteAllTrafficSpecialControl();
        $object->setTrafficControlId($trafficControlId);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function deleteTrafficSpecialControl($trafficControlId, $specialType, $specialKey)
    {
        $object = new DeleteTrafficSpecialControl();
        $object->setTrafficControlId($trafficControlId);
        $object->setSpecialType($specialType);
        $object->setSpecialKey($specialKey);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function setTrafficControlApis($trafficControlId, $groupId, $apiIds, $stageName)
    {
        $object = new SetTrafficControlApis();
        $object->setTrafficControlId($trafficControlId);
        $object->setGroupId($groupId);
        $object->setApiIds($apiIds);
        $object->setStageName($stageName);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function removeTrafficControlApis($trafficControlId, $groupId, $apiIds, $stageName)
    {
        $object = new RemoveTrafficControlApis();
        $object->setTrafficControlId($trafficControlId);
        $object->setGroupId($groupId);
        $object->setApiIds($apiIds);
        $object->setStageName($stageName);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    /* Control End */

    /* App Start */

    protected function createApp($appName, $description)
    {
        $object = new CreateApp();
        $object->setAppName($appName);
        $object->setDescription($description);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
            'AppId'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function modifyApp($appId, $appName, $description)
    {
        $object = new ModifyApp();
        $object->setAppId($appId);
        $object->setAppName($appName);
        $object->setDescription($description);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function describeAppAttributes($appId, $pageSize, $pageNumber)
    {
        $object = new DescribeAppAttributes();
        $object->setAppId($appId);
        $object->setPageSize($pageSize);
        $object->setPageNumber($pageNumber);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
            'TotalCount',
            'PageNumber',
            'PageSize',
            'Apps'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function describeAppSecurity($appId)
    {
        $object = new DescribeAppSecurity();
        $object->setAppId($appId);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
            'AppKey',
            'AppSecret',
            'CreatedTime',
            'ModifiedTime'
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function resetAppSecret($appKey)
    {
        $object = new ResetAppSecret();
        $object->setAppKey($appKey);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function deleteApp($appId)
    {
        $object = new DeleteApp();
        $object->setAppId($appId);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    /* App End */

    /* Authorized Start */

    protected function setApisAuthorities($params)
    {
        $object = new SetApisAuthorities();
        $object->setGroupId($params['GroupId']);
        $object->setStageName($params['StageName']);
        $object->setAppId($params['AppId']);
        $object->setApiIds($params['ApiIds']);
        $object->setDescription($params['Description']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function removeApisAuthorities($params)
    {
        $object = new RemoveApisAuthorities();
        $object->setGroupId($params['GroupId']);
        $object->setStageName($params['StageName']);
        $object->setAppId($params['AppId']);
        $object->setApiIds($params['ApiIds']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function setAppsAuthorities($params)
    {
        $object = new SetAppsAuthorities();
        $object->setGroupId($params['GroupId']);
        $object->setStageName($params['StageName']);
        $object->setApiId($params['ApiId']);
        $object->setAppIds($params['AppIds']);
        $object->setDescription($params['Description']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    protected function removeAppsAuthorities($params)
    {
        $object = new RemoveAppsAuthorities();
        $object->setGroupId($params['GroupId']);
        $object->setStageName($params['StageName']);
        $object->setApiId($params['ApiId']);
        $object->setAppIds($params['AppIds']);

        $serviceObj = new ApiService($object);
        $response   = $serviceObj->get();

        $checks = [
            'RequestId',
        ];

        return [
            'check'     => $this->checkRequired($response, $checks),
            'response'  => $response
        ];
    }

    /* Authorized End */

    private function checkRequired($response, $values)
    {
        $result = true;
        foreach ($values as $key => $value) 
        {
            if(! isset($response[$value]))
            {
                $result = false;
            }
        }

        return $result;
    }

}