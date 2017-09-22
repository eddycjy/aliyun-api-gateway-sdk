<?php

class ApiGroupTest extends BaseTest
{
    private $createGroupName = 'CreateGroup';

    private $modifyGroupName = 'ModifyGroup';

    private $createDescription = 'Create-Description-UnitTest';

    private $modifyDescription = 'Modify-Description-UnitTest';

    private $variableName = 'CreateVarGroup';

    private $variableValue = 'CreateVarUnit';

    public function testCreateApiGroup()
    {
        $createResult = $this->createApiGroup($this->createGroupName, $this->createDescription);

        $this->assertNotFalse($createResult['check']);

        return $createResult['response']['GroupId'];
    }

    /**
     * @depends testCreateApiGroup
     */
    public function testModifyApiGroup($groupId)
    {
        //修改API分组
        $modifyResult = $this->modifyApiGroup($groupId, $this->modifyGroupName, $this->modifyDescription);

        $this->assertNotFalse($modifyResult['check']);

        return $groupId;
    }

    /**
     * @depends testCreateApiGroup
     */
    public function testDescribeApiGroup($groupId)
    {
        //查询API分组详情
        $describeResult = $this->describeApiGroup($groupId);

        $this->assertNotFalse($describeResult['check']);

        return $describeResult;
    }

    /**
     * @depends testDescribeApiGroup
     */
    public function testDescribeApiGroups($describeResult)
    {
        $groupId = $describeResult['response']['GroupId'];
        $groupName = $describeResult['response']['GroupName'];
        $pageNumber = 1;
        $pageSize = 10;

        $describeGroupsResult = $this->describeApiGroups($groupId, $groupName, $pageNumber, $pageSize);

        $this->assertNotFalse($describeResult['check']);

        return $describeResult;
    }

    /**
     * @depends testDescribeApiGroup
     */
    public function testCreateApiStageVariable($describeResult)
    {
        $groupId = $describeResult['response']['GroupId'];
        $stageId = $describeResult['response']['StageItems']['StageInfo'][0]['StageId'];

        $variableResult = $this->createApiStageVariable($groupId, $stageId, $this->variableName, $this->variableValue);

        $this->assertNotFalse($variableResult['check']);
    }

    /**
     * @depends testDescribeApiGroup
     */
    public function testDeleteApiStageVariable($describeResult)
    {
        $groupId = $describeResult['response']['GroupId'];
        $stageId = $describeResult['response']['StageItems']['StageInfo'][0]['StageId'];

        $variableResult = $this->deleteApiStageVariable($groupId, $stageId, $this->variableName);

        $this->assertNotFalse($variableResult['check']);
    }

    /**
     * @depends testDescribeApiGroup
     */
    public function testDescribeApiStage($describeResult)
    {
        $groupId = $describeResult['response']['GroupId'];
        $stageId = $describeResult['response']['StageItems']['StageInfo'][0]['StageId'];

        $stageResult = $this->describeApiStage($groupId, $stageId);

        $this->assertNotFalse($stageResult['check']);
    }

    /**
     * @depends testModifyApiGroup
     */
    public function testDeleteApiGroup($groupId)
    {
        //删除API分组
        $deleteResult = $this->deleteApiGroup($groupId);

        $this->assertNotFalse($deleteResult['check']);
    }



}