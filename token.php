<?php
namespace Lol;

class Token
{
	protected $value = null;

	protected $expects = array();

	public function __construct($value = null) {
		$this->value = $value;
	}

	public function expects($type)
	{
		if(in_array($type, $this->expects)) {
			return true;
		}
		return false;
	}

	public function run() {}

	public function getValue()
	{
		return $this->value;
	}
}
