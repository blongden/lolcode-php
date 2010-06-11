<?php
namespace Lol\Token;

require_once 'token.php';

class Unknown extends \Lol\Token
{
	protected $expects = array(
		'T_UNKNOWN',
		'T_END',
	);
}
