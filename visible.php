<?php
namespace Lol\Token;

require_once 'token.php';

class Visible extends \Lol\Token
{
	protected $expects = array(
		'T_STRING',
		'T_END',
	);
}


