<?php
namespace Lol;

require_once 'lexer.php';
require_once 'start.php';
require_once 'string.php';
require_once 'unknown.php';
require_once 'end.php';
require_once 'hai.php';
require_once 'btw.php';
require_once 'visible.php';
require_once 'kthxbai.php';

class Parser
{
	protected $tree = array();
	protected $statement = array();

	protected $token = null;

	public function __construct(Lexer $lexer)
	{
		$this->token = new Token\Start();
		array_map(array($this, 'parse_token'), $lexer->tokens);
	}

	protected function parse_token($source)
	{
		switch($source['type']) {
			case 'T_STRING':
				$token = new Token\String($source['value']);
				break;
			case 'T_UNKNOWN':
				$token = new Token\Unknown();
				break;
			case 'T_END':
				$token = new Token\End();
				break;
			case 'T_HAI':
				$token = new Token\Hai();
				break;
			case 'T_BTW':
				$token = new Token\Btw();
				break;
			case 'T_VISIBLE':
				$token = new Token\Visible();
				break;
			case 'T_KTHXBAI':
				$token = new Token\Kthxbai();
				break;
			default:
				throw new \Exception(__FUNCTION__ . ": unimplemented keyword $token");
		}
		
		if($this->token->expects($source['type'])) {
			$this->token = $token;
			if ($token instanceof Token\End) {
				$this->tree[] = $this->statement;
				$this->statement = array();
			} else {
				$this->statement[] = $token;
			}
		} else {
			throw new \Exception(__FUNCTION__ . ": parser error: '{$source['type']}' unexpected.");
		}
	}

	public function getTree()
	{
		return $this->tree;
	}
}
