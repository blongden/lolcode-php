<?php
namespace Lol\Token;

require_once 'token.php';

class Hai extends \Lol\Token
{
	protected $expects = array(
		'T_BTW',
		'T_BYES',
		'T_CAN',
		'T_DIAF',
		'T_GIMMEH',
		'T_GTFO',
		'T_I',
		'T_IM',
		'T_IN',
		'T_IZ',
		'T_KTHX',
		'T_KTHXBAI',
		'T_LOLR',
		'T_VISIBLE',
		'T_NUMBER',
		'T_END',
	);
}
