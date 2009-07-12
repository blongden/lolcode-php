<?php
require_once 'lexer.php';
require_once 'start.php';
require_once 'string.php';
require_once 'unknown.php';
require_once 'end.php';
require_once 'hai.php';
require_once 'btw.php';
require_once 'visible.php';
require_once 'kthxbai.php';

class Lol_Parser
{
	protected $tree = array();
	protected $statement = array();

	protected $token = null;

	public function __construct(Lol_Lexer $lexer)
	{
		$this->token = new Lol_Token_Start();
		array_map(array($this, 'parse_token'), $lexer->tokens);
	}

	protected function parse_token($source)
	{
		switch($source['type']) {
			case 'T_STRING':
				$token = new Lol_Token_String();
				break;
			case 'T_UNKNOWN':
				$token = new Lol_Token_Unknown();
				break;
			case 'T_END':
				$token = new Lol_Token_End();
				break;
			case 'T_HAI':
				$token = new Lol_Token_Hai();
				break;
			case 'T_BTW':
				$token = new Lol_Token_Btw();
				break;
			case 'T_VISIBLE':
				$token = new Lol_Token_Visible();
				break;
			case 'T_KTHXBAI':
				$token = new Lol_Token_Kthxbai();
				break;
			default:
				throw new Exception(__FUNCTION__ . ": unimplemented keyword $token");
		}
		
		if($this->token->expects($source['type'])) {
			$this->token = $token;
			if ($token instanceof Lol_Token_End) {
				$this->tree[] = $this->statement;
				$this->statement = array();
			} else {
				$this->statement[] = $token;
			}
		} else {
			throw new Exception(__FUNCTION__ . ": parser error: '{$source['type']}' unexpected.");
		}
	}
}
