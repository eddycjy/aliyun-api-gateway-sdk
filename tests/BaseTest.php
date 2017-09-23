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

use ApiGateway\ApiService;

class BaseTest extends TestCase
{
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