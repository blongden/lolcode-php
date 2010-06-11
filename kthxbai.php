<?php
namespace Lol\Token;

require_once 'token.php';

class Kthxbai extends \Lol\Token
{
	protected $expects = array(
		'T_END',
	);
}
