<?php
require_once 'token.php';

class Lol_Token_Unknown extends Lol_Token
{
	protected $expects = array(
		'T_UNKNOWN',
		'T_END',
	);
}
