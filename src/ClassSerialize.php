<?php
namespace ApiGateway;

trait ClassSerialize
{
	public function toArray($object)
	{
		return get_object_vars($object);
	}
}