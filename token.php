<?php
class Lol_Token
{
	protected $expects = array();
	public function expects($type)
	{
		if(in_array($type, $this->expects)) {
			return true;
		}
		return false;
	}
}
