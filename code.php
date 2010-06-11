<?php
namespace Lol;

require_once 'lexer.php';
require_once 'parser.php';

class Code
{
	protected $debug = false;

	protected $tree = null;

	public function __construct($code, $debug = false)
	{
		$this->debug = $debug;
		$lexer = new \Lol\Lexer($code, $debug);
		$this->tree = new \Lol\Parser($lexer, $debug);
	}

	public function parse()
	{
		print_r($this->lexer);
	}
}
