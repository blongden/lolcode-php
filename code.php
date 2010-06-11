<?php
namespace Lol;

require_once 'lexer.php';
require_once 'parser.php';

class Code
{
	protected $debug = false;

	protected $parser = null;

	public function __construct($code, $debug = false)
	{
		$this->debug = $debug;
		$lexer = new \Lol\Lexer($code, $debug);
		$this->parser = new \Lol\Parser($lexer, $debug);
	}

	public function exec()
	{
		foreach($this->parser->getTree() as $cmd) {
			// pop the top off
			$op = $cmd[0];
			$args = array_slice($cmd, 1);
			if ($op) $op->run($args);
		}
	}
}
