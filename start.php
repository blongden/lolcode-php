<?php
namespace Lol\Token;
require_once 'token.php';

class Start extends \Lol\Token
{
	protected $expects = array(
		'T_HAI',
		'T_END',
	);
}
