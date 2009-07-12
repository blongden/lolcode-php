<?php
class Lol_Lexer
{
	protected $debug = false;
	public $tokens = array();
	
	public static $map = array(
		'T_BTW',
		'T_BYES',
		'T_CAN',
		'T_DIAF',
		'T_GIMMEH',
		'T_GTFO',
		'T_HAI',
		'T_I',
		'T_IM',
		'T_IN',
		'T_IZ',
		'T_KTHX',
		'T_KTHXBAI',
		'T_LOLR',
		'T_VISIBLE',
		'T_NUMBER',
		'T_STRING',
		'T_END',
		'T_UNKNOWN',
	);

	public function __construct($code, $debug=false)
	{
		$this->debug = $debug;
		$this->lexer($code);
	}

	protected function lexer($code)
	{
		$tokens = array();
		$count = preg_match_all("/\w+|\".+\"|'.+'|\.|\n/", $code, $tokens);
		if($this->debug) print __FUNCTION__. ": $count tokens\n";
		$tokens = array_pop($tokens);
		foreach($tokens as $token) {
			$type = null;
			$value = $token;
			switch($token) {
				case "\n":
				case '.':
					$type = 'T_END';
					break;
				default:
					if(in_array("T_".strtoupper($token), Lol_Lexer::$map)) {
						$type = "T_".strtoupper($token);
						break;
					}

					if(preg_match("/[\".+\"|'.+']/", $token)) {
						$type = 'T_STRING';
						break;
					}

					if(is_numeric($token)) {
						$type = 'T_NUMBER';
						break;
					}
			}
			if(is_null($type)) $type = 'T_UNKNOWN';
			$this->tokens[] = array('type' => $type, 'value' => $value);
		}
	}
}

