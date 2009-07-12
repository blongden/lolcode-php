<?php
require_once 'token.php';

class Lol_Token_Visible extends Lol_Token
{
	protected $expects = array(
		'T_STRING',
		'T_END',
	);
}


