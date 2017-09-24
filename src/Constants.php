<?php
namespace ApiGateway;

/**
 * Api Constants
 * 
 * @author    eddycjy <313687982@qq.com>
 * @license   MIT
 */
class Constants
{
	const DS = DIRECTORY_SEPARATOR;

	/* 返回格式 */
		
	const JSON_FORMAT = 'JSON';

	const TEXT_FORMAT  = 'TEXT';

	const BINARY_FORMAT = 'BINARY';

	const XML_FORMAT  = 'XML';

	const HTML_FORMAT  = 'HTML';

	/* 环境名称 */

	const RELEASE_STAGE = 'RELEASE';

	const PRE_STAGE = 'PRE';

	const TEST_STAGE = 'TEST';

	/* API 支持的协议类型 */

	const HTTP_PROTOCOL = 'HTTP';

	const HTTPS_PROTOCOL = 'HTTPS';

	/* API HTTP Method */

	const GET_METHOD = 'GET';

	const POST_METHOD = 'POST';

	const DELETE_METHOD = 'DELETE';

	const PUT_METHOD = 'PUT';

	const HEADER_METHOD = 'HEADER';

	const TRACE_METHOD = 'TRACE';

	const PATCH_METHOD = 'PATCH';

	const CONNECT_METHOD = 'CONNECT';

	const OPTIONS_METHOD = 'OPTIONS';

	/* API 请求的模式 */

	const MAPPING_MODE = 'MAPPING';

	const PASSTHROUGH_MODE = 'PASSTHROUGH';

	/* API POST/PUT请求时，表示数据以何种方式传递给服务器 */

	const FORM_BODY_FORMAT = 'FORM';

	const STREAM_BODY_FORMAT = 'STREAM';

	/* API 公开类型 */

	const PUBLIC_TYPE = 'PUBLIC';

	const PRIVATE_TYPE = 'PRIVATE';

	/* API 安全认证类型 */

	const APP_AUTH = 'APP';

	const ANONYMOUS_AUTH = 'ANONYMOUS';

	const APPOPENID_AUTH = 'APPOPENID';

	/* OpenID Connect模式 */

	const IDTOKEN_OPENID = 'IDTOKEN';

	const BUSINESS_OPENID = 'BUSINESS';

	/* ContentType头的取值策略 */

	const DEFAULT_CONTENTTYPE = 'DEFAULT';

	const CUSTOM_CONTENTTYPE = 'CUSTOM';

	const CLIENT_CONTENTTYPE = 'CLIENT';

	/* ContentType头的取值 */

	//Form POST 表单
	const FORM_CONTENTTYPE_VALUE = 'application/x-www-form-urlencoded; charset=UTF-8';

	/* API 请求参数的取值位置 */

	const BODY_LOCATION = 'BODY';

	const HEAD_LOCATION = 'HEAD';

	const QUERY_LOCATION = 'QUERY';

	const PATH_LOCATION = 'PATH';

	/* API 请求参数的取值类型 */

	const STRING_PARAMETERTYPE = 'String';

	const INT_PARAMETERTYPE = 'Int';

	const LONG_PARAMETERTYPE = 'Long';

	const FLOAT_PARAMETERTYPE = 'Float';

	const DOUBLE_PARAMETERTYPE = 'Double';

	const BOOLEAN_PARAMETERTYPE = 'Boolean';

	/* API 请求参数的是否必填类型 */

	const REQUIRED_REQUIRED = 'REQUIRED';

	const REQUIRED_OPTIONAL = 'OPTIONAL';


	/* 流控策略单位的单位 */

	const MINUTE_UNIT = 'MINUTE';

	const HOUR_UNIT = 'HOUR';

	const DAY_UNIT = 'DAY';

	/* 特殊流控的类型 */

	const APP_SPECIALTYPE = 'APP';

	const USER_SPECIALTYPE = 'USER';
}