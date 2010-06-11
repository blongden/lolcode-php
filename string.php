<?php
namespace Lol\Token;
require_once 'token.php';

class String extends \Lol\Token
{
	protected $expects = array(
		'T_END',
	);

	public function __construct($value)
	{
		$value = substr($value, 1, -1);
		parent::__construct($value);
	}
}
