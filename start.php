<?php
require_once 'token.php';

class Lol_Token_Start extends Lol_Token
{
	protected $expects = array(
		'T_HAI',
		'T_END',
	);
}
