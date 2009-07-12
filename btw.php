<?php
require_once 'token.php';

class Lol_Token_Btw extends Lol_Token
{
	protected $expects = array(
		'T_UNKNOWN',
		'T_END',
	);
}


