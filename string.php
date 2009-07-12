<?php
require_once 'token.php';

class Lol_Token_String extends Lol_Token
{
	protected $expects = array(
		'T_END',
	);
}
