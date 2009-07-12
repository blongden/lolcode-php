<?php
require_once 'lexer.php';
require_once 'parser.php';

class Lol_Code
{
	protected $debug = false;

	protected $tree = null;

	public function __construct($code, $debug = false)
	{
		$this->debug = $debug;
		$lexer = new Lol_Lexer($code, $debug);
		$this->tree = new Lol_Parser($lexer, $debug);
	}

	public function parse()
	{
		print_r($this->lexer);
	}
}
